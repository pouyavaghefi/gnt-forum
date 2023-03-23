<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fname' => 'required|min:3|max:10',
            'lname' => 'required|min:4|max:11',
            'uname' => 'required|unique:users,usr_user_name|max:12|min:5',
            'phone' => 'required|unique:users,usr_mobile_phone|regex:/^09\d{9}$/|max:11|min:11',
            'password' => 'required|max:16|min:8',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'وارد کردن نام الزامی است',
            'fname.min' => 'نام شما خیلی خیلی کم حرف است',
            'fname.max' => 'نام شما بیش از اندازه پر حرف است',

            'lname.required' => 'وارد کردن نام خانوادگی الزامی است',
            'lname.min' => 'نام خانوادگی شما خیلی خیلی کم حرف است',
            'lname.max' => 'نام خانوادگی شما بیش از اندازه پر حرف است',

            'uname.required' => 'وارد کردن نام کاربری الزامی است',
            'uname.unique' => 'نام کاربری بایستی یکتا باشد',
            'uname.min' => 'نام کاربری شما خیلی خیلی کم حرف است',
            'uname.max' => 'نام کاربری شما بیش از اندازه پر حرف است',

            'phone.required' => 'وارد کردن شماره موبایل الزامی است',
            'phone.unique' => 'شماره موبایل بایستی یکتا باشد',
            'phone.min' => 'شماره موبایل شما خیلی خیلی کم حرف است',
            'phone.max' => 'شماره موبایل شما بیش از اندازه پر حرف است',
            'phone.regex' => 'شماره وارد شده معتبر نیست',

            'password.required' => 'وارد کردن رمز عبور الزامی است',
            'password.min' => 'رمز عبور شما خیلی خیلی کم حرف است',
            'password.max' => 'رمز عبور شما بیش از اندازه پر حرف است',
        ];
    }
}
