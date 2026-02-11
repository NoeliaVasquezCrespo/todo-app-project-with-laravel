<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryApiController extends Controller
{
    public function index(Request $request) 
    { 
        $categories = $request->user()->categories()->paginate(10); 

        return response()->json($categories); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name',
            'description' => 'required|string',
            'color'       => 'required|regex:/^#[0-9A-Fa-f]{6}$/'
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->color = $validated['color'];
        $category->user_id = $request->user()->id;
        $category->save();

        return response()->json([
            'message' => 'Categoría creada correctamente',
            'data'    => $category
        ], 201);
    }

    public function show($id)
    {
        $category = auth()->user()->categories()->findOrFail($id);

        return response()->json($category, 200);
    }

    public function update(Request $request, $id)
    {
        $category = $request->user()->categories()->findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name,' . $id,
            'description' => 'required|string',
            'color'       => 'required|string'
        ]);

        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->color = $validated['color'];
        $category->save();

        return response()->json([
            'message' => 'Categoría actualizada correctamente',
            'data'    => $category
        ], 200);
    }

    public function destroy($id)
    {
        $category = auth()->user()->categories()->findOrFail($id);
        $category->delete();

        return response()->json([
            'message' => 'Categoría eliminada correctamente'
        ], 200);
    }
}
