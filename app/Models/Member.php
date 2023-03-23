<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = "members";
    protected $guarded = [];

    public function memberType($type)
    {
        switch($type){
            case 7;
                return "معمولی";
                break;
            case 8;
                return "ادیتور";
                break;
            case 9;
                return "ناظم";
                break;
            case 10;
                return "متخصص";
                break;
            case 11;
                return "مدیر";
                break;
            default:
                return "undefined";
        }
    }
}
