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
		if (($handle = fopen("/Users/Vishal/Thrive/app/Http/Controllers/stock_codes.csv", "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $row++;
		        if($row != 2)
		        {
		        	DB::table('stock_codes')->insert(
		        		[ 'nse_symbol' => $data[0],
		        		  'yahoo_code' => $data[1],
		        		  'name' => $data[2]
		         		]);	
		        }
		        if($row == 1566)
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
    	$stock = DB::table('stock_codes')->where('nse_symbol', $symbol)->first();
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
}
