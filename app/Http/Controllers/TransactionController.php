<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Input;
use Carbon\Carbon;

class TransactionController extends Controller
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

    public function add_payment()
    {
        return view('payment');
    }

    public function update()
    {
        $pay=Input::all();
        if($pay['in']=='')
            $pay['in']=0;
        if($pay['out']=='')
            $pay['out']=0;
        $date=Carbon::now('Asia/Kolkata')->toDateTimeString();
        DB::table('transaction_queue')->insert([
            'id' => $pay['id'],
            'customer_id' => $pay['customer_id'],
            'bank_name' => $pay['bank_name'],
            'account_id' => $pay['account_id'],
            'account_type' => $pay['type'],
            'description' => $pay['description'],
            'address' => $pay['address'],
            'country' => $pay['country'],
            'merchant_name' => $pay['mer_name'],
            'merchant_id' => $pay['mer_id'],
            'payment_mode' => $pay['mode'],
            'money_in' => $pay['in'],
            'money_out' => $pay['out'],
            'created_at' => $date,
            'updated_at' => $date
            ]);

        return view('welcome');
    }
}
