<?php

namespace App\Http\Controllers;

use App\NewsAndEvent;
use Illuminate\Http\Request;

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
        $news->slug = str_slug($request->name);
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
    public function edit(NewsAndEvent $newsAndEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsAndEvent  $newsAndEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsAndEvent $newsAndEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsAndEvent  $newsAndEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsAndEvent $newsAndEvent)
    {
        //
    }
}
