<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuCategory;
use App\Http\Controllers\ImageUpload;
use File;
class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MenuCategory $category)
    {
        $data = $category->get();
        return view('admin.category', compact('data'));
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
    public function store(Request $request, MenuCategory $category)
    {
        $imageName = ImageUpload::imageUpload('node_modules/Image/MenuCategory', $request->file, 350, 350);
        if($category->insert(['name' => $request->name, 'slug' => str_slug($request->name), 'img' => $imageName ]))
        {
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Failed');
        }
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = new MenuCategory();
        $cat = $cat->find($id);
        return view('admin.editCategory', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = new MenuCategory();
        $cat = $cat->find($id);
        $cat->name = $request->name;
        $cat->slug = str_slug($request->name);
        $cat->save();
        return back();
    }
    public function changePhoto($id, Request $request)
    {
        $cat = new MenuCategory();
        $cat = $cat->find($id);
        File::delete('node_modules/Image/MenuCategory/'.$cat->img);
        $imageName = ImageUpload::imageUpload('node_modules/Image/MenuCategory', $request->file, 350, 350);
        $cat->img = $imageName;
        $cat->save();
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $category = new MenuCategory();
        $cat = $category::find($id);
        if( $cat->status == 1){
            $cat->status = 0;
            if($cat->save()){
                $request->session()->flash('status', 'Success');
            } else {
                $request->session()->flash('status', 'Failed');
            }
        } else {
             $cat->status = 1;
            if($cat->save()){
                $request->session()->flash('status', 'Success');
            } else {
                $request->session()->flash('status', 'Failed');
            }
        }
        return back();
    }
}
