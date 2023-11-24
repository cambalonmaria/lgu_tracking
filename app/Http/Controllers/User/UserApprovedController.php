<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User_transaction;
use App\Http\Controllers\Controller;
use App\Models\Approved;
use Illuminate\Support\Facades\Auth;


class UserApprovedController extends Controller
{
     public function approved(){

        $userId = Auth::id();

        // Kuhaa ang mga transactions nga ang destination kay ang ID sa aktibong user
        $transactions = Approved::select('t.*','users.name as u_name')
        ->join('transactions as t','t.id', '=', 'approved.transaction_id')
        ->join('users', 'users.id', '=', 'approved.to_id')
        ->where('approved.from_id', Auth::id())->get();
        ;


        // I-display o gamita ang mga transactions
      
        return view('User.Transaction.approved', compact('transactions'));
         
    }

    
}


