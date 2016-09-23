<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use DB;
use Twilio\Rest\Client;
use Auth;
use Mail;

include_once __DIR__ . '/config.php';

class UserController extends Controller
{

    public function confirmNewUser()
    {
    	$key = Input::get('key');
    	$id = Input::get('id');
    	$user = DB::table('register_user')->where('id', $id)->first();
    	if($key == $user->confirm)
    	{
    		DB::table('users')->where('id', $user->id)->update(['status' => '1']);
    		return view('home');
    	}
    	else
    		return redirect('/');
    }


    public function sendOtp()
    {
    	$otp = mt_rand(100000, 999999);
    	$message = "Your OTP for Thrive is: " . $otp;

    	$sid = TWILIO_SID;
		$token = TWILIO_TOKEN;
		$client = new Client($sid, $token);

		$client->messages->create(
		    "+919819861875",
		    array(
		        'from' => '+13343848048',
		        'body' => $message,
	    	)	
		);

		$user = Auth::user();
		DB::table('users')->where('id', $user['attributes']['id'])
			->update(['otp'=> $otp]);
		return view('verify');
    }


    public function verify()
    {
    	$user = Auth::user();
    	$entered = Input::get('otp');
    	$actual = DB::table('users')->where('id',$user['attributes']['id'])->value('otp');

    	if($entered == $actual)
    		return redirect('/home');
    	else
    	{
    		Auth::logout();
    		// Put in an alert or something to notify OTP entered is invalid!
    		return redirect('/');
    	}
    }
    

    public function activation()
    {
        $user = Auth::user();
        if($user['attributes']['status']==0)
        {
            $key = md5(mt_rand());
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
            // To return a view saying please check mail for link to activate account
        }
        else
            return view('home');
    }

}
