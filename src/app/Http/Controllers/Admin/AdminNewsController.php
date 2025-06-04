<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Models\Category;
use App\Models\News;

class AdminNewsController extends Controller
{
    public function __construct()
    {
        view()->share('menu', 'noticias');
    }

    public function index()
    {
        $news = News::all();

        return view('admin.noticias.index', compact('news'));
    }

    public function create()
    {
        $cat = Category::all();

        return view('admin.noticias.create', compact('cat'));
    }

    public function store(StoreNewsRequest $request)
    {
        // Pega apenas os campos necessários
        $data = $request->only('title', 'content', 'published_at', 'category_id');

        // Checkbox "displayed" (marcado ou não)
        $data['displayed'] = $request->has('displayed');
        $news = News::create($data);

        $news->updated_by = auth()->id();
        $news->save();

        // if ($request->hasFile('image')) {
        //     $news->addMediaFromRequest('image')->toMediaCollection('default');
        // }

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                if ($file->isValid()) {
                    $news->addMedia($file)->toMediaCollection('default');
                }
            }
        }

        if ($request->hasFile('file')) {            
        
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                    $news->addMedia($file)->toMediaCollection('files');
                }
            }
        }

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia criada com sucesso.');
    }

    public function edit(News $noticia)
    {
        $cat = Category::all();

        return view('admin.noticias.edit', ['news' => $noticia, 'cat' => $cat]);
    }

    public function update(StoreNewsRequest $request, News $noticia)
    {
        $data = $request->only('title', 'content', 'published_at', 'displayed', 'category_id');
        $data['displayed'] = $request->has('displayed'); // retorna true ou false
        $data['updated_by'] = auth()->id(); // Adiciona o ID do usuário que atualizou

        $noticia->update($data);

        // if ($request->hasFile('image')) {
        //     $noticia->clearMediaCollection('default');
        //     $noticia->addMediaFromRequest('image')->toMediaCollection('default');
        // }

        if ($request->hasFile('image')) {
            // (opcional) limpa a coleção anterior, se quiser sobrescrever todas as imagens
            $noticia->clearMediaCollection('default');
        
            foreach ($request->file('image') as $image) {
                if ($image->isValid()) {
                    $noticia->addMedia($image)->toMediaCollection('default');
                }
            }
        }

        if ($request->hasFile('file')) {
            // (opcional) limpa a coleção anterior, se quiser sobrescrever todas as imagens
            $noticia->clearMediaCollection('files');
        
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                    $noticia->addMedia($file)->toMediaCollection('files');
                }
            }
        }

       

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia atualizada.');
    }

    public function destroy(News $noticia)
    {
        $noticia->delete();

        return redirect()->route('admin.noticias.index')->with('success', 'Notícia removida.');
    }
}
