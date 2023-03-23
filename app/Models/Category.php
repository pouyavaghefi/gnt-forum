<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function catType()
    {
        return $this->hasOne(Baseinfo::class,'cat_type');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
