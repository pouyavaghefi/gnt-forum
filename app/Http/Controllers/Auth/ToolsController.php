<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ToolsController extends Controller
{
    public function checkUsernameExists(Request $request)
    {
        $data = User::where('usr_user_name', $request->uname)->first();
        return response()->json($data);
    }

    public function checkMobileNumberExists(Request $request)
    {
        $data2 = User::where('usr_mobile_phone', $request->phone)->first();
        return response()->json($data2);
    }

    public function destroySessions()
    {
        Session::forget('nextStep');
        Session::forget('loggedType');
        Session::forget('foundUser');
        Session::forget('passHash');
        Session::forget('userData');
        Session::forget('codeSent');
        Session::forget('wrongPass');
        Session::forget('userData');

        return redirect()->route('auth.login');
    }
}
