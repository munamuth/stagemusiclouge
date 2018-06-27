<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\MenuCategory;
use App\Http\Controllers\ImageUpload;
use File;
use Config;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Menu $menu, MenuCategory $category)
    {
        $menu = $menu->get();
        $categories = $category->get();
        return view('admin.menu', compact('menu', 'categories'));
    }


    public function listByCategory(Menu $menu, MenuCategory $category, $name)
    {
        $category_id = $category->where('slug', $name)->first()->id;

        $menu = $menu->where('category_id', $category_id)->get();
        $categories = $category->get();
        return view('admin.menu', compact('menu', 'categories'));
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
    public function store(Request $request, Menu $menu)
    {
        
        $imageName = ImageUpload::imageUpload('node_modules/Image/Menu', $request->file, 500, 500);

        $menu->name = $request->name;
        $menu->slug = str_slug(rand().$request->name);
        $menu->category_id = $request->category_id;
        $menu->price = $request->price;
        $menu->image = $imageName;
        if( $menu->save() )
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
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Menu $menu, MenuCategory $category)
    {
        $data = $menu->find($id);
        $category = $category->get();

        return view('admin.editMenu', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu, $id)
    {
        $menu = $menu->find($id);
        $menu->name = $request->name;
        $menu->slug = str_slug(rand().$request->name);
        $menu->category_id = $request->category_id;
        $menu->price = $request->price;
        $save = $menu->save();
        if( $save )
        {
            $request->session()->flash('status', "Success<script>window.close()</script>");
        } else {
            $request->session()->flash('status', "Failed");
        }
        return back();
    }
    public function changePhoto($id, Menu $menu, Request $request)
    {   
        $menu = $menu->find($id);        
        $delete = File::delete('node_modules/Image/Menu/'. $menu->image );
        $imageName = ImageUpload::imageUpload('node_modules/Image/Menu', $request->file, 500, 500);
        $menu->image = $imageName;
        $menu->save();
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Menu $menu)
    {
        $menu = $menu->find($id);
        $delete = File::delete('node_modules/Image/Menu/'. $menu->image );
        $menu->destroy($id);
        return back();
    }
}
