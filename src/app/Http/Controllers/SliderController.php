<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\News;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function __construct()
    {
        // Compartilha a variável $menu com todas as views deste controller
        view()->share('menu', 'slider');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = Slider::latest()->paginate(10); // <-- importante

        return view('admin.sliders.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $data = $request->only('title', 'content');
        $data['displayed'] = $request->has('displayed'); // retorna true ou false


        $slider = Slider::create($data);
        $slider->user_id = auth()->id();
        $slider->save();


        if ($request->hasFile('image')) {
            $slider->addMediaFromRequest('image')->toMediaCollection('default');
        }

        return redirect()->route('admin.slider.index')->with('success', 'Notícia criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        $slider = Slider::where('displayed', true)
        ->latest()
        ->with('media')
        ->paginate(10);

        return view('home', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', ['news' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->only('title', 'content');
        $data['user_id'] = auth()->id(); // Adiciona o ID do usuário que atualizou

        echo $data['user_id'] ;
        

        $slider->update($data);

        if ($request->hasFile('image')) {
            $slider->clearMediaCollection('default');
            $slider->addMediaFromRequest('image')->toMediaCollection('default');
        }

        return redirect()->route('admin.slider.index')->with('success', 'Slider atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider removido.');
    }

    public function detail(Slider $slider){

        echo "nada ainda";
       echo $slider->title;

    }

    public function all()
    {
        $news = News::latest()->with('media')->paginate(10);

        return view('noticias', compact('news'));
    }
}
