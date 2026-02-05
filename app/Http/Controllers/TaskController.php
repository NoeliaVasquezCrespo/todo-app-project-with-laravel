<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->get();
        return view('tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::with(['category', 'tags'])->find($id);
        return view('tasks.show', compact('task'));
    }

    public function create() 
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('tasks.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category_id' => $validated['category_id'],
            'status' => false,
        ]);

        $task->tags()->attach($validated['tags']);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }

    public function edit($id) 
    {
        $task = Task::with(['category', 'tags'])->find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('tasks.edit', compact('task','categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($request->has('toggle_status')) {
            $task->update([
                'status' => !$task->status
            ]);

            return redirect()->route('tasks.index');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $task->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category_id' => $validated['category_id'],
        ]);

        $task->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy($id)
    {  
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada exitosamente.');
    }
}