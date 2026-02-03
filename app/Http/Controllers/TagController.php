<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show', compact('tag'));
    }

    public function create() 
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $color = $request->input('color');

        Tag::create([
            'name' => $name,
            'description' => $description,
            'color' => $color
        ]);
        
        return redirect()->route('tags.index')->with('success', 'Etiqueta creada exitosamente.');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $color = $request->input('color');

        $tag = Tag::find($id);

        $tag->update([
            'name' => $name,
            'description' => $description,
            'color' => $color
        ]);

        return redirect()->route('tags.index')->with('success', 'Etiqueta actualizada exitosamente.');
    }

    public function destroy($id)
    {  
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Etiqueta eliminada exitosamente.');
    }
}
