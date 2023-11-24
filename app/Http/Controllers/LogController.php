<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\TrackingLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
   public function documentlog(Request $request){
         $logs=Log::where('id',  $request->id)->first();
        
        return view('Admin.Log.document',[
              'logs'=>$logs
        ]);
    }
    
    public function userViewLog($id){
      $transactions =TrackingLog::select('tracking_logs.title', 'tracking_logs.short_description', 'tracking_logs.department','tracking_logs.updated_at')
      ->where('transaction_id',$id)
      ->join('transactions', 'transactions.id', '=', 'tracking_logs.transaction_id')
      ->get();
      

      return view('User.Log.view-log', compact('transactions'));
  }

  public function adminViewLog($id){
      $transactions =TrackingLog::select('tracking_logs.title', 'tracking_logs.short_description', 'tracking_logs.department','tracking_logs.updated_at')
      ->where('transaction_id',$id)
      ->join('transactions', 'transactions.id', '=', 'tracking_logs.transaction_id')
      ->get();
      

      return view('Admin.Log.view-log', compact('transactions'));
  }
    
  public function searchTransaction(Request $request){
    $search_val = $request->search_value;

    $transactions =TrackingLog::select('tracking_logs.title', 'tracking_logs.short_description', 'tracking_logs.department','tracking_logs.updated_at')
    ->join('transactions', 'transactions.id', '=', 'tracking_logs.transaction_id')
    ->where('transaction_code', $search_val)
    ->get();

    return view('User.Log.document-search',compact('transactions'));
    
}
    
}
