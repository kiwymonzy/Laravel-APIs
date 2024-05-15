<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['project', 'staff'])->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $staffs = Staff::all();
        $projects = Project::all();
        return view('tasks.create', compact('projects', 'staffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'project_id' => 'nullable|exists:projects,id',
            'staff_id' => 'nullable|exists:staffs,id',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        $staffs = Staff::all();

        return view('tasks.edit', compact('task', 'projects', 'staffs'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'project_id' => 'nullable|exists:projects,id',
            'staff_id' => 'nullable|exists:staffs,id',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
