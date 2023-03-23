<?php

namespace App\Http\Controllers;

use App\Events\AnsweredEvent;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    public function submitAnswer(Request $request, $que)
    {
        $data = $request->validate([
            'description' => 'required'
        ]);

        $ans_str = Answer::generateAnsStr(auth()->user());

        $ans = Answer::create([
            'ans_body' => $data['description'],
            'ans_que_id' => $que,
            'ans_type_id' => 12,
            'ans_creator_id' => auth()->user()->id,
            'ans_str' => $ans_str
        ]);

        $question = Question::find($que);
        $question->updated_at = now();
        $question->save();

        event(new AnsweredEvent($ans));

        $this->flashed->success('ثبت شد','جواب شما با موفقیت ثبت شد');

        return redirect()->back();
    }
}
