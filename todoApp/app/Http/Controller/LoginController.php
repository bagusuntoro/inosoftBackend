<?php

namespace App\ContohBootcamp\Controllers;

use App\ContohBootcamp\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {
	public function authenticate(Request $request)
	{
		// check email & password
		$email = $request->post('email');
		$password = $request->post('password');
		$count = User::where(['email'=>$email, 'password'=>Hash::make($password)])->count();

		$isExist = false;
		if($count > 0)
		{
			$isExist = 1;
		}

		// counter attempt
		$key = 'attemp_'.Session::getId();
		$count = Session::get($key, null);

		if($count === null)
		{
			$count = 0;
		} else {
			$count+=1;
		}

		Session::put($key, $count);

		// is email verified

	}
}