<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect('https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks')
            ->with('success', 'Task added successfully!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required|in:Pending,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect('https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks')
            ->with('success', 'Task updated successfully!');
    }

    public function complete(Task $task)
    {
        $task->update([
            'status' => 'Completed'
        ]);

        return redirect('https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks')
            ->with('success', 'Task marked as completed!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('https://turbo-waddle-r76wrpvqg5r53px57-8000.app.github.dev/tasks')
            ->with('success', 'Task deleted successfully!');
    }
}