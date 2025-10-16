<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Project;
use App\Models\User;
use App\Models\Label;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::withCount('comments')->with(['project','assignee'])->paginate(10);
        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        $labels = Label::all();
        return view('issues.create', compact('projects','users','labels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'reporter_id' => 'required|exists:users,id',
            'assignee_id' => 'nullable|exists:users,id',
            'title' => 'required|string|max:255',
            'code' => 'required|string|unique:issues,code',
            'status' => 'required|in:open,in_progress,closed',
            'priority' => 'required|in:low,medium,high',
            'due_window_start' => 'nullable|date',
            'due_window_end' => 'nullable|date',
            'labels' => 'nullable|array',
            'initial_comment' => 'nullable|string'
        ]);

        $dueWindow = null;
        if($request->due_window_start && $request->due_window_end){
            $dueWindow = ['start'=>$request->due_window_start,'end'=>$request->due_window_end];
        }

        $issue = Issue::createWithRelations(
            array_merge($validated,['due_window'=>$dueWindow]),
            $request->initial_comment ?? null,
            $request->labels ?? []
        );

        return redirect()->route('issues.index')->with('success','Issue created successfully.');
    }

    public function show(Issue $issue)
    {
        $issue->load(['comments.user','labels','project','assignee','reporter']);
        return view('issues.show', compact('issue'));
    }
}
