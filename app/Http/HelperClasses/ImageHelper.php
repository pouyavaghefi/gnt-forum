<?php

namespace App\Http\HelperClasses;


class ImageHelper{
    public static function get_thumbnail_url($object, $size='200x200'){
        return self::get_image_url($object, 'feature_image' ,$size);
    }

    public static function get_image_url($object, $type='question_image', $size='200x200'){
        $image = $object->uploaded->where('upf_uploaded_as', $type)->where('upf_dimension', $size)->first();
        if($image){
            return \Illuminate\Support\Facades\Storage::url($image->upf_path);
        }
    }
}
