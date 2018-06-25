<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    public function images()
    {
    	return $this->hasMany('App\GalleryImage');
    }
    public function image()
    {
    	return $this->hasOne('App\GalleryImage');
    }

}
