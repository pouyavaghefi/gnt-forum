<?php

namespace App\Http\HelperClasses;

use App\Models\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Self_;
use Illuminate\Filesystem\Filesystem;

class UploadFile
{
    protected static $file;
    protected static $fileName;
    protected static $typeFile;
    protected static $catType;
    protected static $objId;
    protected static $mimeType;
    protected static $urlResizeImage = [];

    public static function format()
    {
        return [
            'images' => ['jpeg', 'jpg', 'png', 'bmp', 'gif', 'jfif'],
            'videos' => ['mp4', 'mkv', 'flv', 'mov', 'avi', 'wmv'],
            'voices' => ['mp3'],
            'documents' => ['pdf', 'doc', 'pptx', 'xls'],
            'compress' => ['zip', 'rar'],
        ];
    }

    public static function resizeable()
    {
        return [
            'jpg', 'jpeg', 'png', 'bmp'
        ];
    }

    public static function size()
    {
        return [
            [200, 200],
            [600, null]
        ];
    }

    public static function route()
    {
        return "upload/" . jdate()->format('Y') . "/" . jdate()->format('m') . "/" . self::$typeFile . "/" . strtolower(self::$catType)."s" . "/" . self::$objId;
    }


    public static function upload($file,$cat,$queid)
    {
        self::directoryType($file->getClientOriginalExtension());
        self::$mimeType = $file->getMimeType();
        self::$catType = $cat;
        self::$objId = $queid;
        $fileName = self::checkExistFile($file->getClientOriginalName());

        if (in_array($file->getClientOriginalExtension(), self::resizeable())) {
            $file->storeAs(self::route(), $fileName);
            $custom = self::resize($file, $fileName);
        }
        $file->storeAs(self::route(), $fileName);
        $file_name_hash = md5($fileName);
        return [
            "path" =>
                array_merge(self::$urlResizeImage, [[
                    "upf_path" => self::route() . $fileName,
                    "upf_dimension" => "fullsize"
                ]]),
            "option" => [
                "upf_object_id" => "",
                "upf_object_type_id" => "",
                "upf_type" => self::$typeFile,
                "upf_category" => self::$catType,
                "upf_mime_type" => self::$mimeType,
                'upf_file_name' => $fileName,
                'upf_file_hash' => $file_name_hash,
            ]
        ];
    }

    public static function directoryType($typeFile)
    {
        foreach (Self::format() as $key => $value) {
            if (in_array($typeFile, $value)){
                self::$typeFile = $key;
                break;
            }else{
                self::$typeFile = "other";
            }
        }
        return self::$typeFile;
    }

    public static function checkExistFile($fileName)
    {
        $pathFile = storage_path("app/public/" . self::route() . $fileName);

        if (File::exists($pathFile))
            return self::checkExistFile(time() . $fileName);
        else
            return $fileName;
    }

    public static function resize($file, $fileName)
    {
        foreach (self::size() as $key => $value) {
            $baseDirectory  = storage_path(self::route() . "{$value[0]}x{$value[1]}_") ;
            $fs = new Filesystem();
            if (file_exists($baseDirectory) == false) {
                $fs->makeDirectory($baseDirectory, 0755, true);
            }
            $folder = self::route() . "{$value[0]}x{$value[1]}_";
            $resizePath = $folder.'/'. $fileName;

            Image::make($file->getRealPath())
                ->resize($value[0], $value[1], function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path( $resizePath));

            $urlResizeImage[] = ["upf_path" => $resizePath, "upf_dimension" => "{$value[0]}x{$value[1]}"];
        }
        self::$urlResizeImage = $urlResizeImage;
    }
}
