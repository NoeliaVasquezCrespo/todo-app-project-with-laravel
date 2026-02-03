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

}
