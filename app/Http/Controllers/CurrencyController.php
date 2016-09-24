<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;
use Carbon\Carbon;

class CurrencyController extends Controller
{
    public function currentFxRates()
    {
    	$query = "http://api.fixer.io/latest?base=";
    	$user = Auth::user();
    	$id = $user['attributes']['id'];
    	$country = DB::table('users')->where('id', $id)->value('country');
    	$base = DB::table('link_country_currency')->where('country_name', $country)
    			->value('currency_code');

    	$query .= $base;

    	$session = curl_init($query);  
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);      
		$json = curl_exec($session);

		$response = json_decode($json, true);

		$currencies = DB::table('link_account')
						->join('bank', 'link_account.bank_id', '=', 'bank.id')
						->where('user_id', $id)->get();
		$fx_rates = array();
		$i = 0;
		foreach($currencies as $currency)
		{
			if($currency->currency_code != $base)
			{
				$fx_rates[$i]['code'] = $currency->currency_code;
				$fx_rates[$i]['value'] = $response['rates'][$currency->currency_code];
				$i++;
			}
		}
		dd($fx_rates);
    }

    public function time()
    {
    	$time_obj = Carbon::now('Asia/Kolkata');
    	$curr_time = $time_obj . '';
    	echo substr($curr_time,0,16);
    }
}
