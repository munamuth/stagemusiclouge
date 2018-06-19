<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageUpload;
use File;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = new About();
        $about = $about->first();
        return view('admin.about', compact('about'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about, $id)
    {
        $about = $about->find($id);
        $about->descr = $request->descr;
        if( $about->save() ) {
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Failed');
        }
        return back();
    }

    public function changePhoto($id, Request $request, About $about)
    {

        $about = $about->find($id);
        File::delete('node_modules/Image/About/'.$about->img);
        $imageName = ImageUpload::imageUpload('node_modules/Image/About', $request->file, 1366, 768);
        $about->img = $imageName;
        if( $about->save() ) {
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Failed');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
