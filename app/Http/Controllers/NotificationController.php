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
    	DB::table('transaction_history')->insert([
    		'id' => $queued->id,
    		'customer_id' => $queued->customer_id,
    		'bank_name' => $queued->bank_name,
    		'account_id' => $queued->account_id,
    		'account_type' => $queued->account_type,
    		'description' => $queued->description,
    		'address' => $queued->address,
    		'country' => $queued->country,
    		'merchant_name' => $queued->merchant_name,
    		'merchant_id' => $queued->merchant_id,
    		'payment_mode' => $queued->payment_mode,
    		'money_in' => $queued->money_in,
    		'money_out' => $queued->money_out,
    		'created_at' => $queued->created_at,
    		'updated_at' => $queued->updated_at]); 
        return redirect('/mark_as_read');
    }
}
