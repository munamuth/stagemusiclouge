<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Galery;
use App\Menu;
use App\About;
use App\NewsAndEvent;
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

    public function news()
    {
        $news = new NewsAndEvent();
        $news = $news->get();
        return view('page.news', compact('news'));
    }
    public function viewNews($name)
    {
        $news = new NewsAndEvent();
        $related = $news->where('slug', '!=', $name)->take(5)->get();
        $news = $news->where('slug', $name)->first();
        return view('page.view-news', compact('news', 'related'));
    }

    public function contact()
    {
        return view('page.contact');
    }
}
