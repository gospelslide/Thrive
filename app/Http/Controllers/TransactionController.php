<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function transaction_history()
    {
    	$history=DB::table('transaction_history')->select('id','account_id','account_type','bank_name','country','merchant_name','payment_mode','money_in','money_out','status','updated_at')->get();
    	dd($history);
    }

    public function transaction_queue()
    {
    	$queue=DB::table('transaction_queue')->select('id','account_id','account_type','bank_name','country','merchant_name','payment_mode','money_in','money_out','updated_at')->get();
    	dd($queue);//eg:$queue[0]->{'id'}
    }
}
