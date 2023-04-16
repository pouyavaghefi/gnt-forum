<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AccountController extends Controller
{
    public function show()
	{
		return view('frontend.account.show');
	}
	
	public function change(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'current_password' => 'required',
			'password' => 'required|min:8|confirmed',
			'password_confirmation' => 'required',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}

		// logic to update the user's password

		return redirect()->back()->with('success', 'رمز عبور با موفقیت به روز رسانی شد.');
	}
}
