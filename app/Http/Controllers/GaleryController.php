<?php

namespace App\Http\Controllers;

use App\Galery;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageUpload;
use App\Image;
use App\GalleryImage;
use File;
class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Galery $g)
    {
        $data = $g->get();
        return view('admin.gallery', compact('data'));
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

        $file = $request->file;
        foreach ($file as  $value) {
           $imageName = ImageUpload::imageUpload('node_modules/Image/Gallery', $value, 700, 500);
           $image = new Image();
            $galery = new Galery();
            $galeryImage = new GalleryImage();
           $image->name = $imageName;
           $image->save();
           $galery->name = $imageName;
           $galery->save();
           $galeryImage->insert(['image_id' => $image->id, 'galery_id' => $galery->id]);
           echo $value.'<br>';
        }
        $request->session()->flash('status', 'Success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $galery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galery $galery, GalleryImage $galeryImage, Image $image, $id, $name, Request $request )
    {
        if( $galery->find($id)->delete() ){
            $galeryImage->where('galery_id', $id)->delete();
            $image->where('name', $name)->delete();
            File::delete('node_modules/Image/Gallery/'.$name);
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Failed');
        }
        
        return back();
    }
}
