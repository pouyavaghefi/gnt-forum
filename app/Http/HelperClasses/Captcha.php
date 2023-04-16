<?php

namespace App\Http\HelperClasses;

use DB;
use Illuminate\Support\Facades\Log;
use Storage;
use File;

class Captcha
{
    public function make()
    {
        $phrase = strtoupper(bin2hex(random_bytes(3)));
        $ip = \Request::ip();

        $path = 'public/captcha/'.$ip;
        if(!Storage::exists($path))
            Storage::makeDirectory($path);

        $len = strlen($phrase);
        $imgArr = array();

        for($i=0;$i<$len;$i++){
            $text = $phrase[$i];
            $char = $this->singleChar($text);
            $fn = $i.'captcha.png';
            $this->save($char,storage_path('app/'.$path.'/'.$fn));
            $imgArr[] = $fn;
        }
        $this->insert($phrase,$ip);

        return array($imgArr, $phrase);
    }

    public function save($img, $fn)
    {
        return imagepng($img, $fn);
    }

    public function insert($p,$i)
    {
        $exist = DB::table('captcha_requests')->where('cap_requested_ip', $i)->first();
        if(!$exist) {
            DB::table('captcha_requests')->insert([
                'cap_requested_phrase' => $p,
                'cap_requested_ip' => $i,
                'created_at' => \Carbon\Carbon::now()
            ]);
        }else{
            $exist = DB::table('captcha_requests')->where('cap_requested_ip', $i)->update(['cap_requested_phrase' => $p, 'updated_at' => \Carbon\Carbon::now()]);
        }
    }

    public function singleChar($text)
    {
        $width = 100;
        $height = 100;
        $size = 60;
        $textX = 25;
        $textY = 75;
        $angle = 0;
        $font = public_path('assets/fonts/SansBold.ttf');
        $margin = 2;

        $img = imagecreate($width,$height);

        $gbColor = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);

        $r = rand(0x77,0xEF);
        $g = rand(0x77,0xEF);
        $b = rand(0x77,0xEF);

        $shadowgbColor = imagecolorallocate($img, $r, $g, $b);

        $fgColor = imagecolorallocate($img, 0x00,0x00,0x00);

        imagefilledrectangle($img, 0, 0, $width, $height, $fgColor);

        imagefilledrectangle($img, 1, 1, $width-$margin, $height-$margin, $gbColor);

        imagettftext($img, $size, $angle + 5, $textX + 5, $textY + 10, $shadowgbColor, $font, $text);

        imagettftext($img, $size, $angle, $textX, $textY, $fgColor, $font, $text);

        return $img;
    }
}
