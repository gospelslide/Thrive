<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Input;
use Auth;

class AccountController extends Controller
{
    public function add_saving()
    {
    	return view('account.add_saving');
    }

    public function register_saving()
    {
        $user = Auth::user();
    	$account=Input::all();
    	DB::table('saving_account')->insert([
    		'id' => $account['id'],
    		'customer_id' => $user['attributes']['id'],
    		'bank_id' => $account['bank_id'],
    		'balance' => $account['balance'],
            'net_balance' => $account['balance'],
    		'rate_of_interest' => $account['roi']
    		]);
    	//Link acccount

    	return view('welcome');
    }

    public function add_current()
    {
    	return view('account.add_current');
    }

    public function register_current()
    {
        $user = Auth::user();
		$account=Input::all();
    	DB::table('current_account')->insert([
    		'id' => $account['id'],
            'customer_id' => $user['attributes']['id'],
    		'bank_id' => $account['bank_id'],
    		'net_balance' => $account['balance'],
    		'od_limit' => $account['od'],
    		'card_number' => $account['card'],
    		'display_name' => $account['name'],
    		'max_spend' => $account['spend'],
    		'current_balance' => $account['balance'],
    		'expiry_date' => $account['date']
    		]);    	
    	return view('welcome');
    }

    public function add_credit()
    {
    	return view('account.add_credit');
    }

    public function register_credit()
    {
        $user = Auth::user();
    	$account=Input::all();
    	DB::table('credit_account')->insert([
    		'id' => $account['id'],
            'customer_id' => $user['attributes']['id'],
    		'bank_id' => $account['bank_id'],
    		'card_number' => $account['card'],
    		'display_name' => $account['name'],
    		'max_spend' => $account['spend'],
    		'current_balance' => $account['balance'],
    		'expiry_date' => $account['date']
    		]);    	
    	return view('welcome');	
    }
}
