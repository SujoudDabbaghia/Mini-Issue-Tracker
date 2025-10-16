@extends('layout')

@section('title',$issue->title)

@section('content')
<h1>{{ $issue->title }} ({{ $issue->code }})</h1>
<p>Status: {{ $issue->status }} | Priority: {{ $issue->priority }}</p>
<p>Project: <a href="{{ route('projects.show',$issue->project->id) }}">{{ $issue->project->name }}</a></p>
<p>Assignee: {{ $issue->assignee->name ?? 'Unassigned' }}</p>
<p>Reporter: {{ $issue->reporter->name }}</p>

<h3>Labels</h3>
<ul>
    @foreach($issue->labels as $label)
        <li style="color:{{ $label->color }}">{{ $label->name }}</li>
    @endforeach
</ul>

<h3>Comments</h3>
<ul>
    @foreach($issue->comments as $comment)
        <li><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</li>
    @endforeach
</ul>

<h4>Add Comment</h4>
<form action="{{ route('comments.store',$issue->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>User</label>
        <select name="user_id" class="form-control">
            @foreach(\App\Models\User::all() as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Comment</button>
</form>
@endsection
