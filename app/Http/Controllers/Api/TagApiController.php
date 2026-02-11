<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagApiController extends Controller
{
    public function index(Request $request)
    {
        $tags = $request->user()->tags()->paginate(10);

        return response()->json($tags);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:tags,name',
            'description' => 'required|string',
            'color'       => 'required|regex:/^#[0-9A-Fa-f]{6}$/'
        ]);

        $tag = new Tag();
        $tag->name = $validated['name'];
        $tag->description = $validated['description'];
        $tag->color = $validated['color'];
        $tag->user_id = $request->user()->id;

        $tag->save();
        
        return response()->json([
            'message' => 'Etiqueta creada correctamente',
            'data'    => $tag
        ], 201);
    }

    public function show($id)
    {
        $tag = auth()->user()->tags()->findOrFail($id);

        return response()->json($tag, 200);
    }

    public function update(Request $request, $id)
    {
        $tag = $request->user()->tags()->findOrFail($id);

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

        $tag->name        = $validated['name'];
        $tag->description = $validated['description'];
        $tag->color       = $validated['color'];
        $tag->save();

        return response()->json([
            'message' => 'Etiqueta actualizada correctamente',
            'data'    => $tag
        ], 200);
    }

    public function destroy($id)
    {
        $tag = auth()->user()->tags()->findOrFail($id);
        $tag->delete();

        return response()->json([
            'message' => 'Etiqueta eliminada correctamente'
        ], 200);
    }

}

