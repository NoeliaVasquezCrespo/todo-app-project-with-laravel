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

    public function status(Request $request, $id) 
    {
        $task = Task::find($id);

        $task->update([
            'status' => !$task->status
        ]);

        return redirect()->route('tasks.index');
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
        $title = $request->input('title');
        $description = $request->input('description');
        $categoryId = $request->input('category_id');
        $tags = $request->input('tags', []);

        $task = Task::create([
            'title' => $title,
            'description' => $description,
            'category_id' => $categoryId,
            'status' => false
        ]);

        $task->tags()->attach($tags);


        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }

}