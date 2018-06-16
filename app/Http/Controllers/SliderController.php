<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageUpload;
use App\Image;
use App\SliderImage;
use File;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = new Slider();
        $data = $slider->get();
        return view('admin.slider', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image();
        $slider = new Slider();
        $sliderImage = new SliderImage();

        $file = $request->file;
        foreach ($file as  $value) {
           $imageName = ImageUpload::imageUpload('node_modules/Image/Slider', $value, 1366, 768);
           $image = new Image();
            $slider = new Slider();
            $sliderImage = new SliderImage();
           $image->name = $imageName;
           $image->save();
           $slider->name = $imageName;
           $slider->save();
           $sliderImage->insert(['image_id' => $image->id, 'slider_id' => $slider->id]);
           echo $value.'<br>';
        }
        $request->session()->flash('status', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider, SliderImage $sm, Image $image, $id, $name, Request $request)
    {
        if( $slider->find($id)->delete() ){
            $sm->where('slider_id', $id)->delete();
            $image->where('name', $name)->delete();
            File::delete('node_modules/Image/Slider/'.$name);
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Failed');
        }
        
        return back();
    }
}
