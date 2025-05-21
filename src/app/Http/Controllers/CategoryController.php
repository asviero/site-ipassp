<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::all();
        return view('admin.categories.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'slug' => 'required',
        ]);

        $data = $request->only('label', 'slug', 'observation');
       
        $cat = Category::create($data);

        $cat->save();

        return redirect()->route('admin.categorias.create')->with('success', 'Notícia criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categoria)
    {
        return view('admin.categories.edit', ['cat' => $categoria]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categoria)
    {
        $data = $request->only('label', 'slug', 'observation');
        
        //to do validation 
       $categoria->update($data);


        return redirect()->route('admin.categorias.index')->with('success', 'Categoria atualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categoria)
    {
        //
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('success', 'Categoria removida.');
    }
}
