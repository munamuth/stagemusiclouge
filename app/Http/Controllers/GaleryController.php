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

        $galery = new Galery();
        $galery->name = $request->name;
        $galery->slug = str_slug($request->name);
        $galery->save();
        foreach ($file as  $value) {
           $imageName = ImageUpload::imageUpload('node_modules/Image/Gallery', $value, 700, 500);
           $image = new Image();
            $galeryImage = new GalleryImage();
           $image->name = $imageName;
           $image->save();
           $galeryImage->insert(['image_id' => $image->id, 'galery_id' => $galery->id]);
        }
        $request->session()->flash('status', 'Success');
        return back();
    }
    public function addPhoto(Request $request, $gId)
    {
        $file = $request->file;
        foreach ($file as  $value) {
           $imageName = ImageUpload::imageUpload('node_modules/Image/Gallery', $value, 700, 500);

           $image = new Image();
           $image->name = $imageName;
           echo $image->save();

        }
        //return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $galery, $id, Request $request)
    {
        $gallery = $gallery->find($id);
        echo $gallery;
        return view('admin.editGallery', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $galery, $id, Request $request)
    {
        $galery = $galery->find($id);
        $images = $galery->images;
        return view('admin.editGallery', compact('galery', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $galery, $id)
    {
        $galery = $galery->find($id);
        $galery->name = $request->name;
        if($galery->save()){
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Filed');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galery $galery, GalleryImage $galeryImage, Image $image, $id, Request $request )
    {

        if( $galery->find($id)->delete() ){

            $GI =$galeryImage->where('galery_id', $id);
            foreach( $GI->get() as $gi )
            {
               File::delete('node_modules/Image/Gallery/'.$gi->getImage->name);
            }            
            $galeryImage->where('galery_id', $id)->delete();
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Failed');
        }
        
        return back();
    }
    public function destroyImage($gId, $mId, Request $request)
    {
        $image = new Image();
        $GalleryImage = new GalleryImage();
        File::delete('node_modules/Image/Gallery/'.$image->find($mId)->name);
        echo $image->destroy($mId);
        echo $GalleryImage->destroy($gId);
        $request->session()->flash('status', 'Success');
        return back();
    }
}
