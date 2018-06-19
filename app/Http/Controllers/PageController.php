<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Galery;
class PageController extends Controller
{
    public function index(Slider $slider)
    {
    	$images = $slider->get();
    	return view('page.index', compact('images'));
    }

    public function gallery()
    {
    	$gallery = new Galery();
    	$gallery = $gallery->get();
    	return view('page.gallery', compact('gallery'));
    }
}
