<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Input;
use Auth;

class StocksController extends Controller
{

    public function insertStocks()
    {
    	$row = 1;
		if (($handle = fopen("/Users/Vishal/Thrive/app/Http/Controllers/companylist.csv", "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $row++;
		        if($row != 2)
		        {
		        	DB::table('stock_codes')->insert(
		        		[ 'symbol' => $data[0],
		        		  'yahoo_code' => $data[0],
		        		  'name' => $data[1]
		         		]);	
		        }
		        if($row == 2754)
		        	break;
		    }
		    fclose($handle);
		}
    }


    public function addStocks()
    {
    	$name = Input::get('name');
    	$symbol = Input::get('code');
    	$quantity = Input::get('quantity');
    	$price = Input::get('price');
    	$stock = DB::table('stock_codes')->where('symbol', $symbol)->first();
    	if(count($stock) == 1)
    	{
    		$id = DB::table('stock')->insertGetId(['name' => $name, 'code' => $symbol, 
    			'quantity' => $quantity, 'price' => $price]);
    		$user = Auth::user();
 			$user_id = $user['attributes']['id'];
    		DB::table('link_stock')->insert(['user_id' => $user_id, 'stock_id' => $id]);
    		return redirect('/home');
    	}
    	else
    	{
    		$error = "Invalid stock symbol!";
    		return view('add_stocks')->withErrors($error);
    	}
    }

    public function getCurrentPrice()
    {
    	$user = Auth::user();
    	$id = $user['attributes']['id'];
    	$stocks_held = DB::table('link_stock')
    					->join('stock', 'link_stock.stock_id', '=', 'stock.id')
    					->where('link_stock.user_id', $id)->get();
    	$current_prices = [];
    	$yql_base_url = "http://query.yahooapis.com/v1/public/yql"; 
    	foreach($stocks_held as $stock)
    	{
    		echo $stock->code;
    		$yql_query = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quote%20where%20symbol%20%3D%20%22" . $stock->code . "%22&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
    		//dd($yql_query);

    		$session = curl_init($yql_query);  
			curl_setopt($session, CURLOPT_RETURNTRANSFER,true);      
			$json = curl_exec($session);

			$phpObj =  json_decode($json, true); 
			dd($phpObj['query']['results']['quote']);
    	}
    }

    public function predict()
    {
        $stock = DB::table('predictions_stock')->select()->get();
        $avg = ($stock[0]->{'day1'}+$stock[0]->{'day2'}+$stock[0]->{'day3'}+$stock[0]->{'day4'}+$stock[0]->{'day5'}+$stock[0]->{'day6'}+$stock[0]->{'day7'})/7;
        $max=0;
        $min=9999999;
        $day_max=1;
        $day_min=1;
        for($i=1;$i<=7;$i++)
        {
            if($stock[0]->{'day'.$i}>$max)
            {
                $max = $stock[0]->{'day'.$i};
                $day_max = $i;
            }

            if($stock[0]->{'day'.$i}<$min)
            {
                $min = $stock[0]->{'day'.$i};
                $day_min = $i;
            }
        }
        $change = $avg-$stock[0]->{'price'};
        if($change > 0)
            $status = 1;
        else if($change < 0)
            $status = -1;
        else 
            $status = 0;

        dd($avg .',' . $max.',' . $day_max.',' . $min.',' . $day_min.',' . $change.',' . $status);
    }

}









