<?php

namespace App\Http\Controllers;

use App\Models\Rejected;
use App\Models\TrackingLog;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RejectedController extends Controller
{  
	 public function viewRejected(){
        $rejects = Rejected::select(DB::raw('transactions.* ,users.name as u_name, rejected.reason'))
        ->join('users', 'users.id', '=', 'from_id')
        ->join('transactions', 'transactions.id', '=', 'rejected.transaction_id')
        ->where('rejected.to_id', Auth::id())
        ->get();

        
        return view('Admin.Dashboard.view-rejected', compact('rejects'));
     }

   public function rejectNotification(){
      dd(Rejected::where('notif', 0)->update(array(
         'notif' => 1,
         'updated_at' => now()
      )));
      
      return response() -> json([
         'status_code' => 1
      ]);
    
   } 

}

