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

    public function predict()
    {
    	$currency = DB::table('predictions_currency')->select()->get();
    	//INR
    	$inr_avg = ($currency[0]->{'day1'}+$currency[0]->{'day2'}+$currency[0]->{'day3'}+$currency[0]->{'day4'}+$currency[0]->{'day5'}+$currency[0]->{'day6'}+$currency[0]->{'day7'})/7;
    	$max_inr=0;
    	$min_inr=9999999;
    	$day_maxinr=1;
    	$day_mininr=1;
    	for($i=1;$i<=7;$i++)
    	{
    		if($currency[0]->{'day'.$i}>$max_inr)
    		{
    			$max_inr = $currency[0]->{'day'.$i};
    			$day_maxinr = $i;
    		}

    		if($currency[0]->{'day'.$i}<$min_inr)
    		{
    			$min_inr = $currency[0]->{'day'.$i};
    			$day_mininr = $i;
    		}
    	}
    	$change_inr = $inr_avg-$currency[0]->{'price'};
    	if($change_inr > 0)
    		$status_inr = -1;
    	else if($change_inr < 0)
    		$status_inr = 1;
    	else 
    		$status_inr = 0;

    	//dd($inr_avg .',' . $max_inr.',' . $day_maxinr.',' . $min_inr.',' . $day_mininr.',' . $change_inr.',' . $status_inr);
    	$account=array();
    	$user = Auth::user();
    	$credit_bank_id = DB::table('credit_account')->where('customer_id','9')->first();
    	$current_bank_id = DB::table('current_account')->where('customer_id','9')->first();
    	$saving_bank_id = DB::table('saving_account')->where('customer_id','9')->first();
    	//dd($credit_bank_id);
    	$account[] = DB::table('bank')->where('id',$credit_bank_id->{'id'})->get();
    	//dd($account);
    	$account[] = DB::table('bank')->where('id',$current_bank_id->{'id'})->get();
    	$account[] = DB::table('bank')->where('id',$saving_bank_id->{'id'})->get();
    	//dd($account[0][0]->field);
    	$get_account=array();
    	foreach($account as $key=>$value)
    		{
    			if($value[0]->{'country_code'}=="US")
    				$get_account[]=$value;

    		}
    		dd($get_account);
    }
}
