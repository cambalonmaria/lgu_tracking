<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Approved;
use App\Models\Rejected;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $transactions = Transaction::select('users.name', 'transactions.status','transactions.transaction_code','transactions.id')
        // ->join('users', 'users.id', '=', 'transactions.from_id')
        // ->where('status', '=', 'rejected')
        // ->where('notif', 0)
        // ->get();

        $transactions = Rejected::select(DB::raw('transactions.* ,users.name as u_name, rejected.reason'))
        ->join('users', 'users.id', '=', 'from_id')
        ->join('transactions', 'transactions.id', '=', 'rejected.transaction_id')
        ->where('rejected.to_id', Auth::id())
        ->get();


        $approved = Approved::select('users.name', 'transactions.transaction_code','transactions.id')
        ->join('transactions', 'transactions.id', '=', 'approved.transaction_id')
        ->join('users', 'users.id', '=', 'approved.from_id')
        ->where('approved.notif', 0)->get();

        $count_approved = Approved::select(DB::raw('COUNT(DISTINCT(transaction_id)) as count'))->first();

        $notif = Rejected::select('*')->where('notif', 0)->get();
        $notif_approved = Approved::select('*')->where('notif', 0)->get();
        $count_reject = Rejected::select(DB::raw('COUNT(*) as count'))->where('to_id', Auth::id())->first();

        return view('.Admin.Dashboard.index', compact('transactions', 'notif', 'approved', 'notif_approved','count_reject','count_approved'));
    }
}
