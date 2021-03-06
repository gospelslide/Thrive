<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use DB;

class NotificationController extends Controller
{
    public function markAsRead()
    {
    	$id = Input::get('id');
    	$queued = DB::table('transaction_queue')->where('id', $id)->first();
        dd($queued);
    	DB::table('transaction_history')->insert([
    		'customer_id' => $queued->customer_id,
    		'bank_name' => $queued->bank_name,
    		'account_id' => $queued->account_id,
    		'account_type' => $queued->account_type,
    		'country' => $queued->country,
    		'merchant_name' => $queued->merchant_name,
    		'payment_mode' => $queued->payment_mode,
    		'money_in' => $queued->money_in,
    		'money_out' => $queued->money_out,
    		'created_at' => $queued->created_at,
    		'updated_at' => $queued->updated_at,
            'status' => '1']); 

        DB::table('transaction_queue')->where('id', $id)->delete();

        return redirect('/notifications');
    }

    public function notifications()
    {
        $queued = DB::table('transaction_queue')->get();
        $display = array();
        foreach($queued as $notification)
        {
            if($notification->status == 0)
            {
                $message = "$";

                if($notification->money_in == 0)
                {
                    $message .=  $notification->money_out . " paid to " . 
                    $notification->merchant_name . 
                    " on " . $notification->created_at;
                }
                else
                {
                    $message .= $notification->money_in . " deposited in your account by " . 
                                $notification->merchant_name . 
                                " on " . $notification->created_at;
                }
                $message .= " - " . $notification->bank_name . "," . $notification->country;
            }
            else
            {
                $message = "Autosweep alert-Transferred $" . $notification->money_out . 
                        " at " . $notification->created_at . " - " . $notification->bank_name . "," . $notification->country;  
            }
            array_push($display, $message);
        }
        return view('layouts.all_notifications')->with('display', $display);
    }
}
