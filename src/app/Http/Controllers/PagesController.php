<?php

namespace App\Http\Controllers;

use App\Models\Pages;
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
        return view('admin.pages.create', compact('pages'));
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
        ]);

        // Define o ID do usuário autenticado, se aplicável
        $data['user_id'] = auth()->id();
        $data['displayed'] = $request->has('displayed'); // retorna true ou false

        // Cria a nova página com os dados fornecidos
        Pages::create($data);

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
        return view('admin.pages.edit', ['page'=> $pagina, 'parent'=>$pagesParent]);
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
