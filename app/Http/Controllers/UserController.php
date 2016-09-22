<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use DB;

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
    }
}
