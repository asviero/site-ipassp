<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->with('media')->take(5)->get();

        return view('home', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }

    public function all()
    {
        $news = News::latest()->with('media')->paginate(10);

        return view('noticias', compact('news'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $news = News::where('title', 'like', '%'.$query.'%')
            ->orWhere('content', 'like', '%'.$query.'%')
            ->latest()
            ->paginate(5);

        return view('news.search', compact('news', 'query'));
    }
}
