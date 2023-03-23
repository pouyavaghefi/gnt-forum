<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activeCode()
    {
        return $this->hasMany(ActiveCode::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'que_creator_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function dearUser()
    {
        return $this->usr_first_name."ی عزیز!";
    }

    public function scopeSubmitLastLogin($query , $user)
    {
        $user->usr_last_login = Carbon::now();
        $user->save();
    }

    public function scopeSubmitMobileVerified($quer,$user)
    {
        $user->mobile_verified_at = Carbon::now();
        $user->save();
    }

    public function vote()
    {
        return $this->hasMany(Vote::class,'object_id','id');
    }

    public function returnLeastInfo()
    {
        if(!empty($this->usr_mobile_phone)){
            return $this->usr_mobile_phone;
        }elseif(!empty($this->usr_user_name)){
            return $this->usr_user_name;
        }else{
            return $this->usr_email_address;
        }
    }

    public function fullName()
    {
        return $this->usr_first_name . " " .  $this->usr_last_name;
    }
}
