<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Galery;
use App\GalleryImage;
use App\Menu;
use App\About;
use App\NewsAndEvent;
use App\Image;
use App\MenuCategory;
class PageController extends Controller
{
    public function index(Slider $slider)
    {
    	$images = $slider->get();
        $news = new NewsAndEvent();
        $news = $news->take(3)->get();
    	return view('page.index', compact('images', 'news'));
    }

    public function gallery()
    {
    	$gallery = new Galery();
    	$gallery = $gallery->get();
    	return view('page.gallery', compact('gallery'));
    }

    public function viewGallery( $name )
    {
        $galleries = new Galery();
        $gallery = Galery::where('slug', $name)->first();
        $related = $galleries->where('slug', '!=', $name)->get();
        $images = GalleryImage::where('galery_id', $gallery->id)->get();
        return view('page.viewGallery', compact('gallery', 'images', 'related'));
    }

    public function menu()
    {
    	$category = new MenuCategory();
    	$category = $category->where('status', '1')->get();
    	return view('page.category', compact('category'));
    }

    function listMenuByCategory($name)
    {
        $category = new MenuCategory();
        $menu = new Menu();
        $cat = $category->where('slug', $name)->first();
        $cat_id = $cat->id;
        $categories = $category->where('status', 1)->get();
        $menu = $menu->where('category_id', $cat_id)->get();
        return view('page.menu', compact('menu', 'categories'));
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
