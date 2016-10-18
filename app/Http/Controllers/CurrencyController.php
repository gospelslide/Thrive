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
    	$curl = curl_init();

        curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://api119105sandbox.gateway.akana.com/fxRates",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                  CURLOPT_POSTFIELDS => "{\r\n    \"user\":      {\r\n      \"loginName\": \"sbMemgospelslide1\",\r\n      \"password\": \"sbMemgospelslide1#123\",\r\n      \"locale\": \"en_US\"\r\n     }\r\n}",
                  CURLOPT_HTTPHEADER => array(
                    "authorization: cobSession = 08062013_1:ab5f259eda11afd55f975db3b37598698e14579e68a69a63720da2401e2f6bd56015ecdf75848b826e3f6a11e6e47aeb1f09c2fc46980f87a597cfac43210920",
                    "cache-control: no-cache",
                    "postman-token: 67e2ae8b-8db7-c5d6-8991-de23a714c2a0"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                //dd($response);
                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  //echo $response;
                }
                $response=json_decode($response);
                //dd($response->{'rates'});
                foreach($response->{'rates'} as $key=>$currency)
            {
 
                $fx_rates[$key]=$currency;
            }
        

        return view('current')->with('fx_rates',$fx_rates);
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
