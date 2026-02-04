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
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:tags,name',
            'description' => 'required|string',
            'color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        Tag::create($validated);
        
        return redirect()->route('tags.index')->with('success', 'Etiqueta creada exitosamente.');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:tags,name,' . $id,
            'description' => 'required|string',
            'color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update($validated);

        return redirect()->route('tags.index')->with('success', 'Etiqueta actualizada exitosamente.');
    }

    public function destroy($id)
    {  
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Etiqueta eliminada exitosamente.');
    }
}
