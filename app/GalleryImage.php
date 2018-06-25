<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    public function getImage()
    {
    	return $this->hasOne('App\Image', 'id', 'image_id');
    }
}
