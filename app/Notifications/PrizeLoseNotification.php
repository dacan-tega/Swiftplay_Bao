<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PrizeLoseNotification extends Notification
{
    use Queueable;

    protected $prize;
    protected $gameName;

    /**
     * @param $prize
     * @param $gameName
     */
    public function __construct($prize, $gameName)
    {
        $this->prize = $prize;
        $this->gameName = $gameName;
    }

    /**
     * @param $notifiable
     * @return string[]
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * @param $notifiable
     * @return string[]
     */
    public function toArray($notifiable)
    {
        return [
            'message' => __('admin.As_winner') . \Helper::amountFormatDecimal($this->prize) . __('admin.about_game') . $this->gameName,
        ];
    }
}
