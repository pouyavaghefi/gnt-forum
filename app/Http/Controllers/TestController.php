<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function setQuestionCats()
    {
        $questions = Question::all();

        foreach($questions as $question)
        DB::table('category_question')->insert([
            'question_id' => $question->id,
            'category_id' => rand(1,22)
        ]);
    }

    public function setQuestionTats()
    {
        $questions = Question::all();

        foreach($questions as $question)
            DB::table('question_tag')->insert([
                'question_id' => $question->id,
                'tag_id' => rand(1,26)
            ]);
    }
}
