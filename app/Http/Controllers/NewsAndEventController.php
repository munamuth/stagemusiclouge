<?php

namespace App\Http\Controllers;

use App\NewsAndEvent;
use Illuminate\Http\Request;
use File;
class NewsAndEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = new NewsAndEvent();
        $news = $news->get();
        return view('admin.news-and-event', compact('news'));
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
        $news = new NewsAndEvent();
        $imageName = ImageUpload::imageUpload('node_modules/Image/News', $request->file, 700, 500);
        $news->name = $request->name;
        $news->slug = str_slug(rand().$request->name);
        $news->img = $imageName;
        $news->descr = $request->descr;
        $news->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsAndEvent  $newsAndEvent
     * @return \Illuminate\Http\Response
     */
    public function show(NewsAndEvent $newsAndEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsAndEvent  $newsAndEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsAndEvent $newsAndEvent, $id, Request $request)
    {
        $news = $newsAndEvent->find($id);
        return view('admin.edit-news-and-event', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsAndEvent  $newsAndEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsAndEvent $newsAndEvent, $id)
    {
        $news = $newsAndEvent->find($id);
        $news->name = $request->name;
        $news->slug = str_slug(rand().$request->name);
        $news->descr = $request->descr;
        if( $news->save() ) {
            $request->session()->flash('status', 'Success<script>window.close()</script>');
        } else {
            $request->session()->flash('status', 'Failed');
        }
        return back();
    }
    public function changePhoto(Request $request, $id)
    {
        $photo = new NewsAndEvent();
        $photo = $photo->find($id);

        File::delete('node_modules/Image/news/'. $photo->img);
        $imageName = ImageUpload::imageUpload('node_modules/Image/News', $request->file, 700, 500);
        $photo->img = $imageName;
        if( $photo->save() )
        {
            $request->session()->flash('status', 'Success');
        } else {
            $request->session()->flash('status', 'Failed');
        }
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsAndEvent  $newsAndEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsAndEvent $newsAndEvent, $id)
    {
        $news = $newsAndEvent->find($id);
        File::delete('node_modules/Image/News/'.$news->img);
        $newsAndEvent->destroy($id);
        return back();
    }
}
