<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class ToolsController extends Controller
{
    public function web_refresh()
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        return 'Application cache has been cleared';
    }

    public function count_questions()
    {
        $quelist = DB::table('questions')->get();
        $quecount = $quelist->count();
        $response = array('quecount' => $quecount);
        echo json_encode($response);
    }

    public function get_back_to_prev()
    {
        return url()->previous();
    }

    public function flush_sessions(Request $request)
    {
        $request->session()->flush();
    }

    public function count_notifz()
    {
        if(Auth::check()){
            $notiflist = DB::table('notifications')->where('notifiable_id',auth()->user()->id)->whereNull('read_at')->get();
            $notifcount = $notiflist->count();
            $response = array('notifcount' => $notifcount);
            echo json_encode($response);
        }
    }
}
