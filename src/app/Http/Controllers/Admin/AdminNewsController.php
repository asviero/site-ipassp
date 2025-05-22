<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsRequest;

class AdminNewsController extends Controller
{
    public function __construct() {
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
    
        if ($request->hasFile('image')) {
            $news->addMediaFromRequest('image')->toMediaCollection('default');
        }
    
        return redirect()->route('admin.noticias.index')->with('success', 'Notícia criada com sucesso.');
    }
    

    public function edit(News $noticia)
    {
        $cat = Category::all();
        return view('admin.noticias.edit', ['news' => $noticia, 'cat'=> $cat]);
    }

    public function update(StoreNewsRequest $request, News $noticia)
    {
        $data = $request->only('title', 'content', 'published_at', 'displayed', 'category_id');
        $data['displayed'] = $request->has('displayed'); // retorna true ou false
        $data['updated_by'] = auth()->id(); // Adiciona o ID do usuário que atualizou

        $noticia->update($data);

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