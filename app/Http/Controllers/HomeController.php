<?php

namespace App\Http\Controllers;

use App\Models\PinnedPost;
use App\Repositories\HomeRepository;
use App\Repositories\HomeRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Session;

class HomeController extends Controller
{
    private $homeRespository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRespository = $homeRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // cache()->pul('ques');

        $queCnt = Question::count();

//        if(cache()->has('ques')){
//            $ques = cache('ques');
//        }else{
//            $ques = Question::orderBy('created_at', 'DESC')->where('que_private',0)->paginate(10);
//            cache()->put('ques',$ques,Carbon::now()->addMinutes(1));
//        }

        if(str_contains(request()->fullUrl(),'?')){
            $ques = $this->customFilter();
            $ques = $ques->get();
        }else{
            $ques = $this->homeRespository->newest();
            $ques = $ques->get();
        }

        if($request->ajax()){
            $view = view('frontend.layouts.parsers.infinite',compact('ques'))->render();
            return response()->json(['html' => $view]);
        }

        $pinned = PinnedPost::wherePinActive(1)->first();

//        if(auth()->check()){
//            $user = auth()->user();
//            if(Session::has('welcome')){
//                $this->flashed->success($user->dearUser(),Session::get('welcome'));
//            }
//        }

        return view('frontend.index', compact('ques','queCnt','pinned'));
    }

    public function customFilter()
    {
        $ques = null;

        if(\Request::exists('recently')) {
            $ques = $this->homeRespository->recently();
        }

        if(\Request::exists('unsolved')) {
            $ques = $this->homeRespository->unsolved();
        }

        if(\Request::exists('notanswered')) {
            $ques = $this->homeRespository->notanswered();
        }

        if(\Request::exists('chosen')) {
            $ques = $this->homeRespository->chosen();
        }

        if(\Request::exists('favourites')) {
            $ques = $this->homeRespository->favourites();
        }

        if(\Request::exists('controversial')) {
            $ques = $this->homeRespository->controversial();
        }

        if(\Request::exists('mostrated')) {
            $ques = $this->homeRespository->mostrated();
        }

        if(\Request::exists('mostviewed')) {
            $ques = $this->homeRespository->mostviewed();
        }

        if(\Request::exists('bounties')) {
            $ques = $this->homeRespository->bounties();
        }

        if(\Request::exists('specials')) {
            $ques = $this->homeRespository->specials();
        }

        if(\Request::exists('search')) {
            $ques = $this->homeRespository->search();
        }

        return $ques;
    }
}
