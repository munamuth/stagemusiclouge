<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Menu extends Model
{
    public function type()
    {
    	return $this->hasOne('App\MenuCategory', 'id', 'category_id');
    }
}
