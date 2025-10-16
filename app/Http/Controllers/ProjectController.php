<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::withCount('issues')->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load('issues');
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Project::create($validated);
        return redirect()->route('projects.index')->with('success','Project created successfully.');
    }
}
