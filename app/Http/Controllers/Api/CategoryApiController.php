<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name',
            'description' => 'required|string',
            'color'       => 'required|string'
        ]);

        $category = Category::create($validated);
        
        return response()->json([
            'message' => 'Categoría creada correctamente',
            'data'    => $category
        ], 201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        return response()->json($category, 200);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:categories,name,' . $id,
            'description' => 'required|string',
            'color'       => 'required|string'
        ]);

        $category->update($validated);

        return response()->json([
            'message' => 'Categoría actualizada correctamente',
            'data'    => $category
        ], 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Categoría eliminada correctamente'
        ], 200);
    }

}

