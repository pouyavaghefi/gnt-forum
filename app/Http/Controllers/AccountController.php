<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;

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

		$user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->usr_password_hash)) {
            return redirect()->back()->withErrors(['current_password' => 'رمز عبور وارد شده با رمز عبور واقعی شما مطابقت ندارد']);
        }

        $user->update([
            'usr_password_hash' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('success', 'رمز عبور با موفقیت به روز رسانی شد.');
	}
}
