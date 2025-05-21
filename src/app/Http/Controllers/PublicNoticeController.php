<?php

namespace App\Http\Controllers;

use App\Models\PublicNotice;
use Illuminate\Http\Request;

class PublicNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $not = PublicNotice::all(); // <-- importante

        return view('admin.public_notices.index', compact('not'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.public_notices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos campos
    $validated = $request->validate([
        'label' => 'required|string|max:255',
        'number' => 'required|integer',
        'year' => 'required|integer',
        'short_desc' => 'nullable|string',
        'published_on' => 'nullable|date',
        'status' => 'required|in:open,closed',
        'file_path' => 'file|mimes:pdf,docx,odt|max:10240',
    ]);

    // Converte o checkbox para booleano
    $validated['displayed'] = $request->has('displayed');

    // Lida com upload do arquivo
    if ($request->hasFile('file_path')) {
        $path = $request->file('file_path')->store('public_notices');
        $validated['file_path'] = $path;
    }

    // Cria o registro
    $publicNotice = PublicNotice::create($validated);

    return redirect()->route('admin.editais.index')
        ->with('success', 'Edital criado com sucesso!');    
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicNotice $publicNotice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PublicNotice $editai)
    {
        return view('admin.public_notices.edit', ['pn' => $editai]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PublicNotice $editai)
    {

        $request->merge([
            'displayed' => $request->has('displayed'),
        ]);
        
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'number' => 'required|integer',
            'year' => 'required|integer',
            'short_desc' => 'nullable|string',
            'published_on' => 'nullable|date',
            'status' => 'required|in:open,close',
            'displayed' => 'nullable|boolean',
            'file_path' => 'file|mimes:pdf,docx,odt|max:2048', // 2MB
        ]);
    
        $data = $request->only('label', 'number', 'year', 'short_desc', 'published_on', 'status', 'displayed');
        $data['user_id'] = auth()->id(); 
        
        //$data['displayed'] = $request->has('displayed');            
        $updated = $editai->update($data);
        

        if ($request->hasFile('file_path')) {
            $editai->clearMediaCollection('public_notices');
            $editai->addMediaFromRequest('file_path')->toMediaCollection('public_notices');
        }
    
        
        if ($updated) {
            return redirect()->route('admin.editais.index')->with('success', 'Edital atualizado com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Nenhuma alteração detectada.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PublicNotice $editai)
    {
        $editai->delete();
        return redirect()->route('admin.editais.index')->with('success', 'Slider removido.');
    }
}
