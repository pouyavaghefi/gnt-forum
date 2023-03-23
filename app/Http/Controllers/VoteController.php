<?php

namespace App\Http\Controllers;

use App\Events\AnsweredEvent;
use App\Events\VotedEvent;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function vote(Request $request, $objId, $objType,$voteType,$objUserId)
    {
        // check if object type is == questions : answers
        $object = $this->checkObjType($objType,$objId);

        // check if vote type is == upvote : downvote
        $this->checkVoteType($object, $voteType);

        $vote = Vote::create([
            'user_id' => auth()->user()->id,
            'object_id' => $objId,
            'object_type' => $objType,
            'vote_type' => $voteType,
            'object_user_id' => $objUserId,
        ]);

        event(new VotedEvent($vote));

        $this->flashed->success('ثبت شد','با موفقیت ثبت شد');

        return redirect()->back();
    }

    public function checkVoteType($object, $type)
    {
        if($type == 14){
            $object->upvotes = $object->upvotes + 1;
        }else{
            $object->downvotes = $object->downvotes + 1;
        }

        $object->save();
    }

    public function checkObjType($type,$id)
    {
        if($type == 16){
            $obj = Question::find($id);
        }else{
            $obj = Answer::find($id);
        }

        return $obj;
    }
}
