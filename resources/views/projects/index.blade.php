@extends('layout')

@section('title','Projects')

@section('content')
<h1>Projects</h1>
<a href="{{ route('projects.create') }}" class="btn btn-success mb-3">Create Project</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Issues Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
            <tr>
                <td><a href="{{ route('projects.show',$project->id) }}">{{ $project->name }}</a></td>
                <td>{{ $project->issues_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $projects->links() }}
@endsection
