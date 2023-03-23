<?php

namespace App\Http\Controllers;

use App\Http\HelperClasses\UploadFile;
use App\Models\Answer;
use App\Models\Baseinfo;
use App\Models\Category;
use App\Models\CategoryQuestion;
use App\Models\Question;
use App\Models\QuestionTag;
use App\Models\Tag;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Cookie;
use DB;
use Session;
use Validator;
use Illuminate\Support\Str;
use App\Models\UploadedFile;
use GrahamCampbell\Markdown\Facades\Markdown;

class QuestionController extends Controller
{
    public function ask()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.question.ask', compact('categories','tags'));
    }

    public function submitAsk(Request $request)
    {
        $rules = [
            'title' => 'required|max:255|min:5',
            'description' => 'required|max:10000|min:10',
            'category' => 'required',
            'tags' => 'required',
            'type' => 'required',
        ];


        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => ':attribute نمی تواند خالی باشد',
            'max' => ':attribute بیش از حد مجاز است',
            'min' => ':attribute کمتر از حد مجاز است',
        ]);


        $que_slug = str_slug($request->title, '-');

        $que_str = Question::generateQueStr(auth()->user());

        $redirection = false;
        $query = DB::table('questions');

        if($query->where('que_slug',$que_slug)->exists()){
            Session::flash('slugExists',$que_slug);
            $redirection = true;
        }

        $mojaz = ["public","private"];

        if (!in_array($request->type, $mojaz)) {
            Session::flash('typeNotExist', $request->type);
            $redirection = true;
        }

        if ($validator->fails()) {
            return redirect('questions/ask/new')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        if($redirection == true){
            return redirect()->back();
        }else{
            $questionCreated = Question::create([
                'que_title' => $validated['title'],
                'que_slug' => $que_slug,
                'que_body' => $validated['description'],
                'que_private' => 1 ? $request->type == "private" : 0,
                'que_creator_id' => auth()->user()->id,
                'que_str' => $que_str,
            ]);

            $questionCreated->tags()->attach($validated["tags"]);
            $questionCreated->categories()->attach($validated["category"]);

            if($request->has('filep')){
                $files = $request->file('filep');
                foreach ($files as $file) {
                    $this->uploadImage($file, $questionCreated->id, 'question_image');
                }
            }

            Session::flash('message', 'پرسش شما با موفقیت اضافه شد');
        }

        return redirect()->route('question.show',['question' => $questionCreated->que_slug]);
    }

    public function uploadImage($request, $id, $type_image)
    {
        $imagesUrl = UploadFile::upload($request,"Question",$id);
        foreach ($imagesUrl['path'] as $path) {
            UploadedFile::create([
                'upf_object_id' => $id,
                'upf_object_type_id' => $this->objectTable('questions'),
                'upf_path' => $path['upf_path'],
                'upf_uploaded_as' => $type_image,
                'upf_dimension' => $path['upf_dimension'],
                'upf_type' => $imagesUrl['option']['upf_type'],
                'upf_category' => $imagesUrl['option']['upf_category'],
                'upf_mime_type' => $imagesUrl['option']['upf_mime_type'],
            ]);
        }
    }

    public function show(Question $question)
    {
        $newtime = strtotime($question->created_at);

        if(Cookie::get($question->id) != ''){
            Cookie::set('$question->id', '1', 60);
            Redis::incr("views.{$question->id}.questions");
            $question->increment('que_view_count');
        }

        if(Session::has('message')){
            $this->flashed->success('ثبت شد',Session::get('message'));
        }

        $selectedCats = [];
        foreach($question->categories as $category) {
            $similarCats = CategoryQuestion::where('category_id', $category->id)->get();

            foreach($similarCats as $similarc){
                array_push($selectedCats,$similarc);
            }
        }

        $selectedTags = [];
        foreach($question->tags as $tag) {
            $similarTags = QuestionTag::where('tag_id', $tag->id)->get();

            foreach($similarTags as $similart){
                array_push($selectedTags,$similart);
            }
        }

        $selectedAll = array_merge($selectedCats,$selectedTags);

        $ques = [];
        foreach($selectedAll as $selected){
            $que = Question::find($selected->question_id);
            array_push($ques,$que);
        }

        if(count($ques) > 5) {
            for ($i = count($ques); $i > 5; $i--) {
                unset($ques[$i-1]);
            }
        }

        $answers = Answer::where('ans_que_id',$question->id)->get();

        $userVotedAns = [];
        foreach($answers as $answer){
            $userVoted = Vote::where('user_id',auth()->user()->id)->where('object_id',$answer->id)->where('object_type',17)->first();
            if($userVoted){
                array_push($userVotedAns,$answer->id);
            }else{
                continue;
            }
        }

        $userVotedQue = Vote::where('user_id',auth()->user()->id)->where('object_id',$question->id)->first();

        $question->que_view_count += 1;
        $question->save();

        return view('frontend.question.show',compact('userVotedAns','userVotedQue','question','ques','newtime','answers'));
    }
}
