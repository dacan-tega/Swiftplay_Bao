<?php

namespace App\Traits\Gateways;

use App\Models\Deposit;
use App\Models\Gateway;
use App\Models\Transaction;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;


trait BsPayTrait
{
    /**
     * @var $uri
     * @var $clienteId
     * @var $clienteSecret
     */
    protected static string $uri;
    protected static string $clienteId;
    protected static string $clienteSecret;
    protected static string $statusCode;
    protected static string $errorBody;

    /**
     * Generate Credentials
     * Metodo para gerar credenciais
     * @return void
     */
    private static function generateCredentials()
    {
        $setting = Gateway::first();
        if(!empty($setting)) {
            self::$uri = $setting->bspay_uri;
            self::$clienteId = $setting->bspay_cliente_id;
            self::$clienteSecret = $setting->bspay_cliente_secret;

            return self::authentication();
        }

        return false;
    }

    /**
     * Authentication
     *
     * @return false
     */
    private static function authentication()
    {
        $client_id      = self::$clienteId;
        $client_secret  = self::$clienteSecret;
        $cred = 'ZXlKcFpDSTZJak16WWpjNE1qTTFMV0kxT1RjdE1URmxaUzFpWVRReUxUUXlNREV3WVRZd05qQXdOQ0lzSW01aGJXVWlPaUpSY2tOdlpHVWlmUT09OkxNejdjT2FqS1UxeWxia1k0RXFtVDJHcGllUEhSaFhGRDB4ZjhDUzlWb25KWnZ3c0JOZzM1NnJJV3VRQWR0';
        $credentials = base64_encode($client_id . ":" . $client_secret);

        $req = new Client();
        $response = $req->post(self::$uri . 'oauth/token', [
            'headers' => [
                'Authorization' => "Basic $credentials",
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'force_ip_resolve' => 'v4',
            'form_params' => [
                'grant_type' => 'client_credentials'
                ]
            ]);

            if ($response->getStatusCode() == 200) {
                Log::alert('Response: '. $response->getBody());
                $data = json_decode($response->getBody(), true);
                $accessToken = $data['access_token'];

                // Exibir o token para fins de teste.
                //dd($accessToken);

                return $accessToken;
            } else {
                // Lida com erros de acordo com a documentação.
                //$errorBody = json_encode($response);;
                //$statusCode = $errorBody['statusCode'];
                return false;
            }
    }

    /**
     * Request QRCODE
     * Metodo para solicitar uma QRCODE PIX
     * @return \Illuminate\Http\JsonResponse
     */
    public static function requestQrcode($request)
    {
        if($access_token = self::generateCredentials()) {
            $setting = \Helper::getSetting();
            $rules = [
                'amount' => ['required', 'max:'.$setting->min_deposit, 'max:'.$setting->max_deposit],
                'cpf'    => ['required', 'max:255'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $parameters = [
                'amount' => \Helper::amountPrepare($request->amount),
                "external_id" => auth()->user()->id,
                "payerQuestion" => __('admin.service_product'),
                "payer" => [
                    "name" => auth()->user()->name,
                    "document" => \Helper::soNumero($request->cpf)
                ]
            ];

            //$response = Http::withHeaders([
            //    'Authorization' => 'Bearer ' . $access_token,
            //    'Content-Type' => 'application/json',
            //])->post(self::$uri.'pix/qrcode', $parameters);

            $req = new Client();
            $response = $req->post(self::$uri . 'pix/qrcode', [
            'headers' => [
                'Authorization' => "Bearer $access_token",
                'Content-Type' => 'application/json'
            ],
            'force_ip_resolve' => 'v4',
            'json' => $parameters
            ]);

            if ($response->getStatusCode() == 200) {
                $responseData = json_decode($response->getBody(), true);

                Log::alert('Essa prr ' . json_encode($responseData));

                self::generateTransaction($responseData['transactionId'], \Helper::amountPrepare($request->amount)); /// gerando historico
                self::generateDeposit($responseData['transactionId'], \Helper::amountPrepare($request->amount)); /// gerando deposito

                return [
                    'status' => true,
                    'idTransaction' => $responseData['transactionId'],
                    'qrcode' => $responseData['emvqrcps']
                    //'base64' => $responseData['base64image']

                ];
            } else {
                self::$statusCode = $response->status();
                self::$errorBody = $response->body();
                return false;
            }
        }
    }

    /**
     * @param $idTransaction
     * @param $amount
     * @return void
     */
    private static function generateDeposit($idTransaction, $amount)
    {
        Deposit::create([
            'payment_id' => $idTransaction,
            'user_id' => auth()->user()->id,
            'amount' => $amount,
            'type' => 'pix',
            'status' => 0
        ]);
    }

    /**
     * @param $idTransaction
     * @param $amount
     * @return void
     */
    private static function generateTransaction($idTransaction, $amount)
    {
        $setting = \Helper::getSetting();

        Transaction::create([
            'payment_id' => $idTransaction,
            'user_id' => auth()->user()->id,
            'payment_method' => 'pix',
            'price' => $amount,
            'currency' => $setting->currency_code,
            'status' => 0
        ]);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public static function consultStatusTransaction($request)
    {
        $transaction = Transaction::where('payment_id', $request->idTransaction)->where('status', 1)->first();
        if(!empty($transaction)) {
            return response()->json(['status' => 'PAID']);
        }

        return response()->json(['status' => 'NOPAID'], 400);
    }

    /**
     * Make Payment
     *
     * @param array $array
     * @return false
     */
    public static function MakePayment(array $array)
    {
        if($access_token = self::generateCredentials()) {

            $pixKey     = $array['pix_key'];
            $pixType    = self::FormatPixType($array['pix_type']);
            $amount     = $array['amount'];
            $doc        = \Helper::soNumero($array['document']);

            $user = auth()->user();
            $parameters = [
                'amount' => floatval(\Helper::amountPrepare($amount)),
                "external_id" => $array['payment_id'],
                "description" => __('admin.Making_payment'),
                "creditParty" => [
                    "key" => $user->cpf,
                    "keyType" => 'CPF',
                    "name" => $user->name,
                    "taxId" => $user->cpf
                ]
            ];

            $req = new Client();
            $response = $req->post(self::$uri . 'pix/payment', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token,
                    'Content-Type' => 'application/json'
                ],
                'force_ip_resolve' => 'v4',
                'json' => $parameters
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200 || $statusCode == 201) {
                $responseData = json_decode($response->getBody(), true);

                if($responseData['status'] === 'PROCESSING') {
                    $withdrawal = Withdrawal::find($array['payment_id']);
                    if(!empty($withdrawal)) {
                        $withdrawal->update([
                            'proof' => $responseData['transactionId'],
                            'status' => 1,
                        ]);
                        return true;
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
        return false;
    }

    /**
     * @param $type
     * @return string|void
     */
    private static function FormatPixType($type)
    {
        switch ($type) {
            case 'email':
                return 'EMAIL';
            case 'document':
                return 'CPF';
            case 'document':
                return 'CNPJ';
            case 'randomKey':
                return __('admin.RANDOM');
            case 'phoneNumber':
                return __('admin.TELEPHONE');
        }
    }
}
