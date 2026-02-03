<?php

namespace App\Http\Controllers;

use App\Models\Task;
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

}