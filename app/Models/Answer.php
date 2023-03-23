<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use DB;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answers';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'ans_creator_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function scopeGenerateAnsStr($query , $user)
    {
        do {
            $str = Str::random(10);
        }while($this->checkAnsStrIsUnique($user,$str));

        return $str;
    }

    private function checkAnsStrIsUnique($user, $str)
    {
        $query = DB::table('answers');
        return !! $query->whereAnsStr($str)->exists();
    }

    public function vote()
    {
        return $this->hasMany(Vote::class,'object_id','id');
    }

    public function scopeCheckAnsVote($query, $ans)
    {
        $voted = Vote::where('user_id',auth()->user()->id)->where('object_type',17)->where('object_id',$ans)->first();
        if($voted){
            return $voted;
        }
        return null;
    }

    public function ansOwner($id)
    {
        if (auth()->user()->id == $id) {
            return true;
        }else{
            return false;
        }
    }
}
