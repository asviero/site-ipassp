<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.noticias.index', compact('news'));
    }

    public function create()
    {
        return view('admin.noticias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $news = News::create($request->only('title', 'content'));

        if ($request->hasFile('image')) {
            $news->addMediaFromRequest('image')->toMediaCollection('default');
        }

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia criada com sucesso.');
    }

    public function edit(News $noticia)
    {
        return view('admin.noticias.edit', ['news' => $noticia]);
    }

    public function update(Request $request, News $noticia)
    {
        $noticia->update($request->only('title', 'content'));

        if ($request->hasFile('image')) {
            $noticia->clearMediaCollection('default');
            $noticia->addMediaFromRequest('image')->toMediaCollection('default');
        }

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia atualizada.');
    }

    public function destroy(News $noticia)
    {
        $noticia->delete();
        return redirect()->route('admin.noticias.index')->with('success', 'Notícia removida.');
    }
}
