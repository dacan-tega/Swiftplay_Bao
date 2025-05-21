<?php

namespace App\Helpers;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQHelper {

    const EXCHANGE_CALL_EVENTS = 'call_events';
    
    const ROUTING_KEY_CALL = 'call';

    const QUEUE_NAME_CALL = 'call';

    public $host;
    public $port;
    public $user;
    public $pass;

    /** @var AMQPStreamConnection */
    private $_connection;

    /** @var AMQPChannel */
    private $_channel;

    private $_callbackCorrelationId;
    private $_callbackResponse;

    public function __construct()
    {
        $this->host = env('RABBITMQ_HOST');
        $this->port = env('RABBITMQ_PORT');
        $this->user = env('RABBITMQ_USER');
        $this->pass = env('RABBITMQ_PASS');
    }

    public function openConnection() {
        $this->_connection = new AMQPStreamConnection($this->host, $this->port, $this->user, $this->pass);

        $this->_channel = $this->_connection->channel();
        
    }

    public function closeConnection() {
        $this->_channel->close();
        $this->_connection->close();

        $this->_channel = null;
        $this->_connection = null;
    }

    public function declareExchange($exchangeName) {
        $this->_channel->exchange_declare($exchangeName, 'direct', false, true, false);
    }

    public function declareQueue($queueName) {
        try {
            //create durable queue
            $this->_channel->queue_declare($queueName, false, true, false, false);
        } catch (Exception $e) {
            //if error, create non-durable queue instead
            $this->openConnection();
            $this->_channel->queue_declare($queueName, false, false, false, false);
        }
    }

    public function bindQueueToExchange($queueName, $exchangeName, $routingKey) {
        $this->_channel->queue_bind($queueName, $exchangeName, $routingKey);
    }   

    public function publishMessage($data, $exchangeName, $routingKey) {
        $msg = new AMQPMessage($data, [
            'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
        ]);

        $this->_channel->basic_publish($msg, $exchangeName, $routingKey);

    }

    public function consumeMessage($queueName, $callback, $autoAck = false) {
        $this->_channel->basic_qos(null, 1, null);
        $this->_channel->basic_consume($queueName, '', false, $autoAck, false, false, $callback);

        while ($this->_channel->is_open()) {
            $this->_channel->wait();
        }
    }

    public function __destruct()
    {
        if ($this->_connection) {
            $this->closeConnection();
        }
    }

    public function declareCallbackQueue() {
        if (!$this->_channel) {
            return;
        }

        list($queueName, , ) = $this->_channel->queue_declare('', false, false, true, false);

        return $queueName;
    }

    public function publishCallMessage($data) {
        
        if (is_array($data)) {
            $data = json_encode($data);
        }

        $callbackQueue = $this->declareCallbackQueue();

        $this->_channel->basic_consume($callbackQueue, '', false, true, false, false, function($response) {
            /** @var AMQPMessage $response */
            if ($response->get('correlation_id') == $this->_callbackCorrelationId) {
                $this->_callbackResponse = $response->body;
            }
        });

        $this->_callbackResponse = null;
        $this->_callbackCorrelationId = uniqid();

        $message = new AMQPMessage(
            $data,
            [
                'correlation_id' => $this->_callbackCorrelationId,
                'reply_to' => $callbackQueue
            ],
        );

        $this->declareExchange(self::EXCHANGE_CALL_EVENTS);
        $this->_channel->basic_publish($message, self::EXCHANGE_CALL_EVENTS, self::ROUTING_KEY_CALL);

        while (!$this->_callbackResponse) {
            $this->_channel->wait(null, false, 3);
        }
        return $this->_callbackResponse;
    
    }
}