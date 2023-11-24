<?php

namespace App\Http\Controllers;

use App\Models\Approved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovedController extends Controller
{
    public function index()
    {
        $approved_transactions = Approved::all();

        return view('Admin.Transaction.approved', compact('approved_transactions'));
    }

    public function statuss(Approved $approved)
    {
        $approved->update(['status' => 'approved']);

        // You can add further logic here (e.g., send notifications)

        return redirect()->route('approved.status   ')->with('success', 'Post approved successfully.');
    }

    public function viewApproved(){
      
        $approved = Approved::select('*')
        ->join('transactions', 'transactions.id', '=', 'approved.transaction_id')
        ->get();
        return view('Admin.Dashboard.view-approved', compact('approved'));
       
    }

    public function approvedNotification(){

        Approved::where('notif', 0)->update(array(
            'notif' => 1
        ));

        return response() -> json([
            'status_code' =>1
        ]);
    }
}
