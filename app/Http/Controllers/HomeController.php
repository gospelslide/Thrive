<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use Mail;
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
        return view('home');
    }

    public function activation()
    {
        $user = Auth::user();
        if($user['attributes']['status']==0)
        {
            $key = md5(rand());
            DB::table('register_user')->insert(
                ['id' => $user['attributes']['id'], 'confirm' => $key]
            );
            $url = "localhost:8000/confirm?id=" . $user['attributes']['id'] . 
            "&key=" . $key;
            $email = $user['attributes']['email'];
            Mail::send('confirmation_email', ['url' => $url], 
                function ($message) use ($email) {
                $message->to($email);
            });
            // To return a view saying please check mail for link
        }
        else
            return view('home');
    }

}
