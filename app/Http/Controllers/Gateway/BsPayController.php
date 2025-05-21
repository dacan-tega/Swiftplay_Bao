<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Withdrawal;
use App\Traits\Affiliates\AffiliateHistoryTrait;
use App\Traits\Gateways\BsPayTrait;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Deposit;

class BsPayController extends Controller
{
    use BsPayTrait, AffiliateHistoryTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * @param Request $request
     * @return null
     */
    public function getQRCodePix(Request $request)
    {
        $user = auth()->user();
        // $response = self::requestQrcode($request);

        // Log::info('Ezz qr'. json_encode($response));
        $deposit = Deposit::create([
            'payment_id' => 1,
            'user_id' => $user->id,
            'amount' => $request->amount,
            'type' => 'pix',
            'status' => 0
        ]);
        // $user->wallet->balance = $user->wallet->balance + $request->amount;
        // $user->wallet->save();
        return $deposit;
        // return $response;
    }

    /**
     * Store a newly created resource in storage.
     */

    public function callbackMethod(Request $request)
    {
        ///\DB::table('debug')->insert(['text' => json_encode($request->all())]);


        if($request->input('test')){

            return response(null, 200);


        }

        $body = $request->input('requestBody');
        if($body['transactionType'] == 'PAYMENT'){

            $withdrawal = Withdrawal::where('proof', $body['transactionId'])->where('status', 0)->first();
            if(!empty($withdrawal)) {


                $withdrawal->update(['status' => 1]);

                //$wallet = Wallet::where('user_id', $withdrawal->user_id)->first();
                //if(!empty($wallet)) {
                //    if($withdrawal->update(['status' => 1])) {
                 //       $wallet->increment('balance', $withdrawal->price); /// add saldo
                //
                ///        self::updateAffiliate($withdrawal->payment_id, $withdrawal->user_id, $withdrawal->price);
                //    }
                //}
            }


            Log::alert('CONFIRM SAQUE'. json_encode($body));
            return response(null, 200);
        }


        //Log::alert('PAY CONFIRM '. json_encode($body));
        if(isset($body['transactionId']) && $body['transactionType'] == 'RECEIVEPIX') {
            $transaction = Transaction::where('payment_id', $body['transactionId'])->where('status', 0)->first();
            if(!empty($transaction)) {
                $wallet = Wallet::where('user_id', $transaction->user_id)->first();
                if(!empty($wallet)) {
                    if($transaction->update(['status' => 1])) {
                        $wallet->increment('balance', $transaction->price); /// add saldo

                        self::updateAffiliate($transaction->payment_id, $transaction->user_id, $transaction->price);
                    }
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function consultStatusTransactionPix(Request $request)
    {
        return self::consultStatusTransaction($request);
    }

    /**
     * Display the specified resource.
     */
    public function withdrawalFromModal($id)
    {
        $withdrawal = Withdrawal::find($id);
        if(!empty($withdrawal)) {
            $parm = [
                'pix_key'           => $withdrawal->chave_pix,
                'pix_type'          => $withdrawal->tipo_chave,
                'amount'            => $withdrawal->amount,
                'document'          => $withdrawal->document,
                'payment_id'        => $withdrawal->id
            ];

            $resp = self::MakePayment($parm);

            if($resp) {
                $withdrawal->update(['status' => 1]);
                Notification::make()
                    ->title(__('admin.Requested_withdrawal'))
                    ->body(__('admin.Successfully_withdrawal'))
                    ->success()
                    ->send();

                return back();
            }else{
                Notification::make()
                    ->title(__('admin.Withdrawal_error'))
                    ->body(__('admin.Error_ withdrawal'))
                    ->danger()
                    ->send();

                return back();
            }
        }
    }

    public function withdrawalFromModalAprrove($id)
    {
        $withdrawal = Withdrawal::find($id);
        if(!empty($withdrawal)) {
            $withdrawal->update(['status' => 1,'pendding' => 1]);
                Notification::make()
                    ->title(__('admin.Requested_withdrawal'))
                    ->body(__('admin.Successfully_withdrawal'))
                    ->success()
                    ->send();

                return back();
        } else {
            return back(); 
        }
    }

    public function withdrawalFromModalDecline($id)
    {
        $withdrawal = Withdrawal::find($id);
        if(!empty($withdrawal)) {
            $userId = $withdrawal->user_id;
            $user = User::where("id", $userId)->first();   
            $user->wallet->increment('balance', floatval($withdrawal->amount));
            $withdrawal->update(['status' => 0,'pendding' => 1]);
                Notification::make()
                    ->title(__('admin.Requested_withdrawal'))
                    ->body(__('admin.Successfully_withdrawal'))
                    ->success()
                    ->send();

                return back();
        } else {
            return back(); 
        }
    }

    public function depositFromModalAprrove($id)
    {
        $deposit = Deposit::find($id);
        if(!empty($deposit)) {   
            $userId = $deposit->user_id;
            $user = User::where("id", $userId)->first();   
            $user->wallet->increment('balance', floatval($deposit->amount));
            $deposit->update(['status' => 1,'pendding' => 1]);
                Notification::make()
                    ->title(__('admin.Requested_deposit'))
                    ->body(__('admin.Successfully_deposit'))
                    ->success()
                    ->send();

                return back();
        } else {
            return back(); 
        }
    }

    public function depositFromModalDecline($id)
    {
        $deposit = Deposit::find($id);
        if(!empty($deposit)) {
            // dd($deposit);
            // $deposit->update(['pendding' => 1]);
            $deposit->update(['status' => 0,'pendding' => 1]);
                Notification::make()
                    ->title(__('admin.Requested_deposit'))
                    ->body(__('admin.Successfully_deposit'))
                    ->success()
                    ->send();

                return back();
        } else {
            return back(); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
