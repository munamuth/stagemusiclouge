<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuCategory;
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
        if($category->insert(['name' => $request->name ]))
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
        //
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
        //
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
