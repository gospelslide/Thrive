<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Input;
use Carbon\Carbon;
use Auth;

class TransactionController extends Controller
{
    public function transaction_history()
    {
    	$history=DB::table('transaction_history')->select('id','account_id','account_type','bank_name','country','merchant_name','payment_mode','money_in','money_out','status','updated_at')->get();
    	//dd($history);
        return view('transaction.history')->with('history',$history);

    }

    public function transaction_queue()
    {
    	$queue=DB::table('transaction_queue')->select('id','account_id','account_type','bank_name','country','merchant_name','payment_mode','money_in','money_out','status','updated_at')->get();
    	//dd($queue);//eg:$queue[0]->{'id'}
        return view('transaction.queued')->with('queue',$queue);
    }

    public function add_payment()
    {
        return view('payment');
    }

    public function update()
    {
        $user = Auth::user();
        $pay=Input::all();
        if($pay['in']=='')
            $pay['in']=0;
        if($pay['out']=='')
            $pay['out']=0;
        $table = '';
        if($pay['type'] == 'current')
            $table = 'current_account';
        if($pay['type'] == 'saving')
            $table = 'saving_account';
        if($pay['type'] == 'credit')
            $table = 'credit_account';
        $status = 0;
        if($pay['out']!=0)
        {
            $account = DB::table($table)->where('id', $pay['account_id'])->first();
            if($table != 'credit_account')
            {
                $net_balance = $account->net_balance-$pay['out'];
                if($net_balance <= 0)
                {
                    $bank = DB::table('bank')->where('name', $pay['bank_name'])->first();
                    $account = DB::table('credit_account')->where([
                                ['customer_id' ,'=', $user['attributes']['id']],
                                ['bank_id' ,'=', $bank->id]
                                ])->first();
                    $status = 1;
                    DB::table('credit_account')->where([
                                ['customer_id' ,'=', $user['attributes']['id']],
                                ['bank_id' ,'=', $bank->id]
                                ])->update(['current_balance' => $account->current_balance+$pay['out']]);
                }
            }
        }

        $date=Carbon::now('Asia/Kolkata')->toDateTimeString();
        $date[15] = $date[15]+1;
        DB::table('transaction_queue')->insert([
            'customer_id' => $user['attributes']['id'],
            'bank_name' => $pay['bank_name'],
            'account_id' => $pay['account_id'],
            'account_type' => $pay['type'],
            'country' => $pay['country'],
            'merchant_name' => $pay['mer_name'],
            'payment_mode' => $pay['mode'],
            'money_in' => $pay['in'],
            'money_out' => $pay['out'],
            'status' => $status,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        return redirect('/home');
    }
}
