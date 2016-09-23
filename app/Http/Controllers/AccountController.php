<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Input;

class AccountController extends Controller
{
    public function add_saving()
    {
    	return view('account.add_saving');
    }

       public function edit_saving()
    {
    	return view('account.edit_saving');
    }

       public function register_saving()
    {
    	$account=Input::all();
    	DB::table('saving_account')->insert([
    		'id' => $account['id'],
    		'description' => $account['description'],
    		'customer_id' => $account['customer_id'],
    		'bank_id' => $account['bank_id'],
    		'sort_code' => $account['sort_code'],
    		'balance' => $account['balance'],
    		'rate_of_interest' => $account['roi']
    		]);
    	//Link acccount

    	return view('welcome');
    }

       public function add_current()
    {
    	return view('account.add_current');
    }

       public function edit_current()
    {
    	return view('account.edit_current');
    }

    public function update_current()
    {
    	$update=Input::all();
    	DB::table('current_account')->where('id',$update['id'])
    	->update(['autosweep' => $update['sweep'],'autosweep_schedule' => $update['auto_date']]);

    	return view('welcome');
    }

       public function register_current()
    {
		$account=Input::all();
    	DB::table('current_account')->insert([
    		'id' => $account['id'],
    		'description' => $account['description'],
    		'customer_id' => $account['customer_id'],
    		'bank_id' => $account['bank_id'],
    		'sort_code' => $account['sort_code'],
    		'net_balance' => $account['balance'],
    		'autosweep' => $account['sweep'],
    		'autosweep_schedule' => $account['auto_date'],
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

       public function edit_credit()
    {
    	return view('account.edit_credit');
    }

       public function register_credit()
    {
    	$account=Input::all();
    	DB::table('credit_account')->insert([
    		'id' => $account['id'],
    		'description' => $account['description'],
    		'customer_id' => $account['customer_id'],
    		'bank_id' => $account['bank_id'],
    		'card_number' => $account['card'],
    		'display_name' => $account['name'],
    		'max_spend' => $account['spend'],
    		'current_balance' => $account['balance'],
    		'type' => $account['type'],
    		'expiry_date' => $account['date']
    		]);    	
    	return view('welcome');	
    }
}
