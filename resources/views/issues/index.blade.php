@extends('layout')

@section('title','Issues')

@section('content')
<h1>Issues</h1>
<a href="{{ route('issues.create') }}" class="btn btn-success mb-3">Create Issue</a>

<table class="table">
    <thead>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Project</th>
            <th>Comments</th>
        </tr>
    </thead>
    <tbody>
        @foreach($issues as $issue)
            <tr>
                <td>{{ $issue->code }}</td>
                <td><a href="{{ route('issues.show',$issue->id) }}">{{ $issue->title }}</a></td>
                <td>{{ $issue->status }}</td>
                <td>{{ $issue->priority }}</td>
                <td>{{ $issue->project->name }}</td>
                <td>{{ $issue->comments_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $issues->links() }}
@endsection
