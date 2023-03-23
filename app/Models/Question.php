<?php

namespace App\Models;

use Database\Factories\AnswerFactory;
use Filament\Resources\Form;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use DB;
use Spatie\FilamentMarkdownEditor\MarkdownEditor;

class Question extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'questions';
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'que_creator_id');
    }

    public function getRouteKeyName()
    {
        return 'que_slug';
    }

    public function scopeGenerateQueStr($query , $user)
    {
        do {
            $str = Str::random(10);
        }while($this->checkQueStrIsUnique($user,$str));

        return $str;
    }

    private function checkQueStrIsUnique($user, $str)
    {
        $query = DB::table('questions');
        return !! $query->whereQueStr($str)->exists();
    }

    public function uploaded()
    {
        return $this->hasMany(UploadedFile::class, 'upf_object_id', 'id')->where('upf_category', '=','Question');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class,'ans_que_id');
    }

    public function vote()
    {
        return $this->hasMany(Vote::class,'object_id','id');
    }

    public function showParticipants()
    {
        return $this->que_creator_id;
    }

    public function queOwner($id)
    {
        if (auth()->user()->id == $id) {
            return true;
        }else{
            return false;
        }
    }

    public function queBestAnswerIsNull()
    {
        if (is_null($this->que_best_ans_id)){
            return true;
        }else{
            return false;
        }
    }

    public function bestAnswer()
    {
        return $this->hasOne(Answer::class,'id','que_best_ans_id');
    }

    public function prevQue($id)
    {
        $first_id = Question::all()->first()->id;
        $prev_id = $id - 1;
        for($i=$prev_id;$i>=$first_id;$i--){
            $question = Question::find($i);
            if($question){
                return $question->que_slug;
                break;
            }else{
                continue;
            }
        }
    }

    public function nextQue($id)
    {
        $last_id = Question::all()->last()->id;
        $next_id = $id + 1;
        for($i=$next_id;$i<=$last_id;$i++){
            $question = Question::find($i);
            if($question){
                return $question->que_slug;
                break;
            }else{
                continue;
            }
        }
    }


}
