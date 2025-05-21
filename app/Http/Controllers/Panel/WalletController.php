<?php

namespace App\Http\Controllers\Panel;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Order;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\NewDepositNotification;
use App\Notifications\NewWithdrawalNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $orders = Order::where('user_id', auth()->id())->paginate();
        return view('panel.wallet.index', compact(['orders']),['categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function viewWithdrawals(Request $request)
    {
        $categories = Category::all();
        $withdrawals = Withdrawal::whereUserId(auth()->id())->latest()->paginate();
        return view('panel.wallet.withdrawal', compact(['withdrawals','categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function viewDeposits()
    {
        
        $categories = Category::all();
        $deposits = Deposit::whereUserId(auth()->id())->latest()->paginate();
        return view('panel.wallet.deposits', compact(['deposits','categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function hideBalance()
    {
        $hideBalance = auth()->user()->wallet->hide_balance;

        $user = User::find(auth()->id());
        if(!empty($user)) {
            $user->wallet()->update(['hide_balance' => $hideBalance == 0 ? 1 : 0]);
        }

        return back()->with('success', __('admin.Visibility_changed_successfully'));
    }

    /**
     * @param Request $request
     * @return void
     */
    public function generateDeposit(Request $request)
    {
        
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function requestWithdrawal(Request $request)
    {
        $setting = \Helper::getSetting();
        $rules = [
            'amount' => ['required', 'numeric', 'min:'.$setting->min_withdrawal, 'max:'.$setting->max_withdrawal],
            'chave_pix' => 'required',
            'tipo_chave' => 'required',
            'document' => 'required',
            'accept_terms' => 'required',
        ];

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }


        // if($request->accept_terms == "1") {
            if(floatval($request->amount) > floatval(auth()->user()->wallet->balance)) {
                return response()->json(['status' => false, 'error' => __('admin.not_enough_balance')]);
            }
            $withdrawal = Withdrawal::create([
                'user_id' => auth()->id(),
                'amount' => \Helper::amountPrepare($request->amount),
                // 'amount' => $request->amount,
                'type' => 'pix',
                'chave_pix' => 0,
                'tipo_chave' => 0,
                // 'chave_pix' => $request->chave_pix,
                // 'tipo_chave' => $request->tipo_chave,
                // 'document' => $request->document,
                'status' => 0,
            ]);
            if($withdrawal) {
                auth()->user()->wallet->decrement('balance', floatval($request->amount));
                // $admins = User::where('role_id', 0)->get();
                // foreach ($admins as $admin) {
                //     $admin->notify(new NewWithdrawalNotification(auth()->user()->name, $request->amount));
                // }

                return response()->json([
                    'status' => true,
                    'message' => __('admin.Withdrawal_completed_successfully'),
                ], 200);
            }
        // }

        return response()->json(['status' => false, 'error' => __('admin.need_accept_terms')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
