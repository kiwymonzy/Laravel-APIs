<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        //return $projects; // return a json
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function redirectToSearch($projectId)
    {
        // Retrieve the project by its ID
        $project = Project::find($projectId);

        // Check if the project exists
        if ($project) {
            // Redirect to the project details page
            return redirect()->route('projects.show', ['project' => $projectId]);
        } else {
            // If project not found, redirect to the project index page with an error message
            return redirect()->route('projects.index')->with('error', 'Project not found');
        }
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
