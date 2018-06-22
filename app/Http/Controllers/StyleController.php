<?php

namespace App\Http\Controllers;

use App\style;
use Illuminate\Http\Request;
use File;
class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $style = new Style();
        $style = $style->where('id', 1)->first();
        return view('admin.style', compact('style'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function style(Request $request)
    {
        $style = new style();
        $style = $style->find(1);
        $style->header_background = $request->hbackground;
        $style->header_text = $request->htext;
        $style->header_border_top = $request->hbordertop;
        $style->header_border_bottom = $request->hborderbottom;
        $style->header_text_hover = $request->htexthover;
        $style->footer_background = $request->fbackground;
        $style->footer_text = $request->ftext;
        $style->footer_border_top = $request->fbordertop;
        $style->bottom_background = $request->bbackground;
        $style->bottom_text = $request->btext;
        if($style->save()){
            $request->session()->flash('status', 'Success');
        }else {            
            $request->session()->flash('status', 'Failed');
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logo(Request $request)
    {
        $logo = new Style();
        $logo = $logo->find(1);
        return view('admin.logo', compact('logo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\style  $style
     * @return \Illuminate\Http\Response
     */
    public function logoUpdate(style $style, Request $request)
    {
        $logo = $style->find(1);
        $imageName = ImageUpload::imageUpload('node_modules/logo/', $request->file, 200, 71);
        File::delete('node_modules/logo/'. $logo->logo);
        $logo->logo = $imageName;
        if( $logo->save() )
        {
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Failed');
        }
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\style  $style
     * @return \Illuminate\Http\Response
     */
    public function edit(style $style)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\style  $style
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, style $style)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\style  $style
     * @return \Illuminate\Http\Response
     */
    public function destroy(style $style)
    {
        //
    }
}
