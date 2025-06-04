<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\StorePagesRequest;

class PagesController extends Controller
{

    public function __construct()
    {
        // Compartilha a variável $menu com todas as views deste controller
        view()->share('menu', 'paginas');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Pages::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Pages::all();
        $menu = Menu::all();
        return view('admin.pages.create', compact('pages', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePagesRequest $request)
    {
         // Extrai apenas os campos necessários do request
        $data = $request->only([
            'title',
            'content',
            'views',
            'slug',
            'parent_id',
            'order',
            'menu_id'
        ]);

        // Define o ID do usuário autenticado, se aplicável
        $data['user_id'] = auth()->id();
        $data['displayed'] = $request->has('displayed'); // retorna true ou false

        // Cria a nova página com os dados fornecidos
        $page = Pages::create($data);


        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                if ($file->isValid()) {
                    $page->addMedia($file)->toMediaCollection('default');
                }
            }
        }


        if ($request->hasFile('file')) {            
        
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                    $page->addMedia($file)->toMediaCollection('files');
                }
            }
        }

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('admin.paginas.create')->with('success', 'Página criada com sucesso.');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pages $pagina)
    {
        $pagesParent = Pages::all();
        $menu = Menu::all();
        return view('admin.pages.edit', ['page'=> $pagina, 'parent'=>$pagesParent, 'menu'=>$menu]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePagesRequest $request, Pages $pagina)
    {
          // Extrai apenas os campos necessários do request
          $data = $request->only([
            'title',
            'content',
            'views',
            'slug',
            'parent_id',
            'order',
        ]);

        // Define o ID do usuário autenticado, se aplicável
        $data['user_id'] = auth()->id();
        $data['displayed'] = $request->has('displayed'); // retorna true ou false

        // Cria a nova página com os dados fornecidos
        if (!$pagina->update($data)){
            return back()->withErrors(['campo' => 'Ocorreu um erro ao processar sua solicitação.'])->withInput();
        }


        if ($request->hasFile('image')) {
            // (opcional) limpa a coleção anterior, se quiser sobrescrever todas as imagens
            $pagina->clearMediaCollection('default');
        
            foreach ($request->file('image') as $image) {
                if ($image->isValid()) {
                    $pagina->addMedia($image)->toMediaCollection('default');
                }
            }
        }


        // Redireciona com uma mensagem de sucesso
        return redirect()->route('admin.paginas.index')->with('success', 'Página atualizada com sucesso.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pages $pagina)
    {
        $pagina->delete();

        return redirect()->route('admin.paginas.index')->with('success', 'Pagina removida.');
    }
}
