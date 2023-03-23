<?php

namespace App\Http\Controllers;

use App\Events\AnsweredEvent;
use App\Events\BestAnswerEvent;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class BestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$queCreatorId,$ansId,$queId,$ansCreatorId)
    {
        if (auth()->user()->id == $queCreatorId) {
            $findQue = Question::find($queId);
            $findQue->que_best_ans_id = $ansId;
            $findQue->save();

            event(new BestAnswerEvent($findQue->bestAnswer));

            Session::flash('message','بهترین جواب ثبت شد');
        }

        return redirect()->back();
    }
}
