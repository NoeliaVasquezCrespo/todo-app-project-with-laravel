<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }

    public function create() 
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $color = $request->input('color');

        Category::create([
            'name' => $name,
            'description' => $description,
            'color' => $color
        ]);
        
        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');
    }

}