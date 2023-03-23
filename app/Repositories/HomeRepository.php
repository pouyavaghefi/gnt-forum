<?php
namespace App\Repositories;

use App\Models\Answer;
use App\Models\Question;
use Request;
use Route;

class HomeRepository implements HomeRepositoryInterface
{
    public function newest()
    {
        return Question::orderBy('created_at', 'desc')->where('que_private',0);
    }

    public function recently()
    {
        return Question::orderBy('updated_at', 'desc');
    }

    public function solved()
    {
        return Question::orderBy('created_at', 'desc')->whereNotNull('que_best_ans_id');
    }

    public function unsolved()
    {
        return Question::orderBy('created_at', 'desc')->whereNull('que_best_ans_id');
    }

    public function notanswered()
    {
        return Question::doesntHave('answers');
    }

    public function chosen()
    {
        return Question::orderBy('created_at', 'desc')->whereQueChosen(1);
    }

    public function favourites()
    {
        return Question::orderBy('likes', 'desc');
    }

    public function controversial()
    {
        return Question::query()->withCount('answers')->orderByDesc('answers_count');
    }

    public function mostrated()
    {
        return Question::orderBy('upvotes','desc');
    }

    public function mostviewed()
    {
        return Question::orderBy('que_view_count','desc');
    }

    public function bounties()
    {
        return Question::orderBy('created_at', 'desc')->whereQueBountied(1);
    }

    public function specials()
    {
        return Question::orderBy('created_at', 'desc')->whereQueSpecia(1);
    }

    public function search()
    {
        return Question::where('que_title', 'like', '%' . request('search') . '%');
    }
}
