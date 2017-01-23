<?php
namespace App\Classes;
use Image;
use File;

class AppHelper
{

    public static function imageProcessor($image,$upload_folder,$imgDms)
    {
        $filename   =   $image->getClientOriginalName();
        $filename   =   pathinfo($filename, PATHINFO_FILENAME);
        $imageName  =   str_slug($filename).'.'.$image->getClientOriginalExtension();
        if(is_dir($upload_folder)==false){
            File::makeDirectory($upload_folder, 0777, true);
        }
        $upload     =   $image->move($upload_folder, $imageName);
        Image::make($upload_folder. '/' .$imageName)
            ->resize($imgDms['height'], $imgDms['width'])
            ->save ($upload);
        return $imageName;

    }

}
