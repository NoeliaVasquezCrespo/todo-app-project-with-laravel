<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskApiController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->with(['category', 'tags'])->paginate(10);

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags'        => 'required|array',
            'tags.*'      => 'exists:tags,id'
        ]);

        $task = new Task();
        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->category_id = $validated['category_id'];
        $task->status = 1;
        $task->user_id = $request->user()->id;
        $task->save();

        $task->tags()->attach($validated['tags']);

        return response()->json([
            'message' => 'Tarea creada correctamente',
            'data'    => $task->load(['category', 'tags'])
        ], 201);
    }

    public function show($id)
    {
        $task = auth()->user()->tasks()->with(['category', 'tags'])->findOrFail($id);

        return response()->json(['data' => $task], 200);
    }

    public function update(Request $request, $id)
    {
        $task = $request->user()->tasks()->findOrFail($id);

        if ($request->has('status')) {
            $task->status = $request->status;
            $task->save();

            return response()->json([
                'message' => 'Estado actualizado correctamente',
                'data'    => $task
            ], 200);
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags'        => 'required|array',
            'tags.*'      => 'exists:tags,id'
        ]);

        $task->title = $validated['title'];
        $task->description = $validated['description'];
        $task->category_id = $validated['category_id'];
        $task->save();

        $task->tags()->sync($validated['tags']);

        return response()->json([
            'message' => 'Tarea actualizada correctamente',
            'data'    => $task->load(['category', 'tags'])
        ], 200);
    }

    public function destroy($id)
    {
        $task = auth()->user()->tasks()->findOrFail($id);

        $task->delete();

        return response()->json([
            'message' => 'Tarea eliminada correctamente'
        ], 200);
    }
}
