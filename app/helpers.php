<?php

use Intervention\Image\Facades\Image;

if(!function_exists('digits_persian')){
    function digits_persian($string){
        $persian = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
        $num = range(0,9);
        $string = str_replace($num,$persian,$string);

        return $string;
    }
}

if(!function_exists('show_avatar')){
    function show_avatar($letter){
        switch($letter){
            case 'a':
                return 'A.svg';
                break;
            case 'b':
                return 'B.svg';
                break;
            case 'c':
                return 'C.svg';
                break;
            case 'd':
                return 'D.svg';
                break;
            case 'e':
                return 'E.svg';
                break;
            case 'f':
                return 'F.svg';
                break;
            case 'g':
                return 'G.svg';
                break;
            case 'h':
                return 'H.svg';
                break;
            case 'i':
                return 'I.svg';
                break;
            case 'j':
                return 'J.svg';
                break;
            case 'k':
                return 'K.svg';
                break;
            case 'k':
                return 'K.svg';
                break;
            case 'l':
                return 'L.svg';
                break;
            case 'm':
                return 'M.svg';
                break;
            case 'n':
                return 'N.svg';
                break;
            case 'o':
                return 'O.svg';
                break;
            case 'p':
                return 'P.svg';
                break;
            case 'q':
                return 'Q.svg';
                break;
            case 'r':
                return 'R.svg';
                break;
            case 's':
                return 'S.svg';
                break;
            case 't':
                return 'T.svg';
                break;
            case 'u':
                return 'U.svg';
                break;
            case 'v':
                return 'V.svg';
                break;
            case 'w':
                return 'W.svg';
                break;
            case 'x':
                return 'X.svg';
                break;
            case 'y':
                return 'Y.svg';
                break;
            case 'z':
                return 'Z.svg';
                break;
            default:
                return 'user.png';
        }
    }
}

if(!function_exists('character_limiter')) {
    function character_limiter($str, $s = 0,$n = 5)
    {
        $string = strip_tags($str);
        if (strlen($string) > $n) {

            // truncate string
            $stringCut = substr($string, $s, $n);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, $s, $endPoint) : substr($stringCut, $s);
            $string .= '...';
        }
        return $string;
    }
}

if(!function_exists('home_filter')) {
    function home_filter($m = '?')
    {
        if(str_contains(request()->fullUrl(),$m)){

        }else{
            return "active";
        }
    }
}

if(!function_exists('search_params')) {
    function search_params()
    {
        if(\Request::exists('search')){
            return $_GET['search'];
        }else{
            return '';
        }
    }
}

