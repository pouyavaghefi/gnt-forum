<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaptchaRequest extends Model
{
    use HasFactory;
    protected $table = "captcha_requests";
    protected $guarded = [];
}
