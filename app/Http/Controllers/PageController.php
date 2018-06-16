<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
class PageController extends Controller
{
    public function index(Slider $slider)
    {
    	$images = $slider->get();
    	return view('page.index', compact('images'));
    }
}
