<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
	public function getLogin(Request $request)
	{
		Cache::flush();

		return view('/login');
	}

	public function postLogin(Request $request)
	{
		//dd($request->all());
		$rule = [
			'user' => 'required|email',
			'password' => 'required|min:6',
		];
		$masage = [
			'user.required' => 'Tài khoản không được để trống',
			'user.email' => 'Bạn phải nhập địa chỉ email',
			'password.required' => 'Mật khẩu không được để trống',
			'password.min' => 'Bạn phải nhập ít nhất 6 ký tự',
		];

		$validator = Validator::make($request->all(), $rule, $masage);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		} 
		$user = $request->input('user');
		$password = $request->input('password');
		$json = ['json' => ['email' => $user, 'password' => $password]];
	
		$request = ApiHelpers::request(env('URL_API','https://supper-event.herokuapp.com/'), 'post', '/api/users/login.json', $json);
		
		$result = json_decode($request->getBody());
		if (!empty($result->token)) {
			Cache::forget('auth_token');
			Cache::forget('user');
			
			Cache::add('auth_user', $result->user->email, 3600);
			Cache::add('user_id', $result->user->_id, 3600);
			Cache::add('token.'.$result->user->email, $result->token, 3600);

			Cache::add('auth_token', $result->token, 3600);
			Cache::add('user', $result->user, 3600);
			return redirect()->intended('home');
		}
		$errors = new MessageBag(['errorLogin' => 'Sai tên tài khoản hoặc mật khẩu!!!']);

		return redirect()->back()->withErrors($errors)->withInput();
		
		
	}
}
