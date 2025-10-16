@extends('layout')

@section('title','Create Issue')

@section('content')
<h1>Create Issue</h1>

<form action="{{ route('issues.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Project</label>
        <select name="project_id" class="form-control" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Reporter</label>
        <select name="reporter_id" class="form-control" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Assignee</label>
        <select name="assignee_id" class="form-control">
            <option value="">-- Unassigned --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Code</label>
        <input type="text" name="code" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="open">Open</option>
            <option value="in_progress">In Progress</option>
            <option value="closed">Closed</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Priority</label>
        <select name="priority" class="form-control">
            <option value="low">Low</option>
            <option value="medium" selected>Medium</option>
            <option value="high">High</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Due Window Start</label>
        <input type="date" name="due_window_start" class="form-control">
    </div>

    <div class="mb-3">
        <label>Due Window End</label>
        <input type="date" name="due_window_end" class="form-control">
    </div>

    <div class="mb-3">
        <label>Labels</label>
        <select name="labels[]" multiple class="form-control">
            @foreach($labels as $label)
                <option value="{{ $label->id }}">{{ $label->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Initial Comment</label>
        <textarea name="initial_comment" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Issue</button>
</form>
@endsection
