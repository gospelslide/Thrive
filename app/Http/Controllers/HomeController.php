<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $credit_accounts = DB::table('credit_account')->
                            where('customer_id', $user['attributes']['id'])->get();
        $savings_accounts = DB::table('saving_account')->
                            where('customer_id', $user['attributes']['id'])->get();
        $current_accounts = DB::table('current_account')->
                            where('customer_id', $user['attributes']['id'])->get();
        return view('home', compact('credit_accounts', 'savings_accounts', 'current_accounts'));
    }

}