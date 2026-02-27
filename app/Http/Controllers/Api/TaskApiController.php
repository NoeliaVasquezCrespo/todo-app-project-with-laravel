<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskApiController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['category', 'tags']) ->paginate(10); 
        return response()->json($tasks, 200);
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

        $task = Task::create([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'status'      => false
        ]);

        $task->tags()->sync($validated['tags']);

        return response()->json([
            'message' => 'Tarea creada correctamente',
            'data'    => $task->load(['category', 'tags'])
        ], 201);
    }

    public function show($id)
    {
        $task = Task::with(['category', 'tags'])->find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        return response()->json(['data' => $task], 200);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|boolean',
            'tags'        => 'required|array',
            'tags.*'      => 'exists:tags,id'
        ]);

        $task->update([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'status'      => $validated['status']
        ]);

        $task->tags()->sync($validated['tags']);

        return response()->json([
            'message' => 'Tarea actualizada correctamente',
            'data'    => $task->load(['category', 'tags'])
        ], 200);
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Tarea eliminada correctamente'
        ], 200);
    }
}
