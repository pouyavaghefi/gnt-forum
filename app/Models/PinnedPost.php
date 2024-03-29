<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinnedPost extends Model
{
    use HasFactory;
    protected $table = 'pinned_posts';
    public $timestamps = false;
    protected $guarded = [];
}
