<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
use Image;

class ImageUpload extends Controller
{
    public static function imageUpload($path, $file, $w, $h ){
       	$imageName = 'stagemusiclouge_'.Carbon::now()->format('YmdHs').'.'.$file->getClientOriginalExtension();
       	$upload = $file->move($path, $imageName);
       	$upload = Image::make($upload)->resize($w, $h)->save();
       	return $imageName;
    }
    public static function copyImage($pathOld, $pathNew, $w, $h ){
        $upload = \File::copy($pathOld, $pathNew);
       	$upload = Image::make($pathNew)->resize($w, $h)->save();
       	//return $upload;
    }
}
