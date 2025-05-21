<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\User;
use Carbon\Carbon;

class SeamlessRepository
{ 
    // private User $user;

    // public function __construct(User $user) {
    //     $this->user = $user;
    // }

    public function myUserName() {
        $user = auth()->user();
        return $user ? $user : 0;
    }

    public function myWallet() {
        $user = auth()->user();
        return $user? $user->wallet->balance : 0;
    }

    public function updateWallet(User $user, $wallet) {
        // $newAmount = $user->wallet->balance - $amount;
        $user->wallet->balance = $wallet;
        $user->wallet->save();
        return $wallet;
    }

    public function deposit(User $user, $amount, $note='') {
        $newAmount = (float)$user->wallet->balance + $amount;
        $user->wallet->balance = $newAmount;
        $user->wallet->save();
        return $newAmount;
    }

    public function withdraw(User $user, $amount, $note='') {
        $newAmount = $user->wallet->balance - $amount;
        if ($newAmount >=0) {
            $user->wallet->balance = $newAmount;
            $user->wallet->save();
        } else {
            $newAmount = -1;
        }

        return $newAmount;
    }
}