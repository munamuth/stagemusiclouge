<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Galery;
use App\Menu;
use App\About;
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

    public function menu()
    {
    	$menu = new Menu();
    	$menu = $menu->get();
    	return view('page.menu', compact('menu'));
    }
    public function about(About $about)
    {
        $about = $about->first();
        return view('page.about', compact('about'));
    }
}
