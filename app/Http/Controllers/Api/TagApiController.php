<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagApiController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return response()->json(['tags' => $tags], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:tags,name',
            'description' => 'required|string',
            'color'       => 'required|string'
        ]);

        $tag = Tag::create($validated);
        
        return response()->json([
            'message' => 'Etiqueta creada correctamente',
            'data'    => $tag
        ], 201);
    }

    public function show($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json([
                'message' => 'Etiqueta no encontrada'
            ], 404);
        }

        return response()->json($tag, 200);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json([
                'message' => 'Etiqueta no encontrada'
            ], 404);
        }

        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:tags,name,' . $id,
            'description' => 'required|string',
            'color'       => 'required|string'
        ]);

        $tag->update($validated);

        return response()->json([
            'message' => 'Etiqueta actualizada correctamente',
            'data'    => $tag
        ], 200);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json([
                'message' => 'Etiqueta no encontrada'
            ], 404);
        }

        $tag->delete();

        return response()->json([
            'message' => 'Etiqueta eliminada correctamente'
        ], 200);
    }

}

