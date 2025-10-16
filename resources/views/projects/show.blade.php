@extends('layout')

@section('title',$project->name)

@section('content')
<h1>{{ $project->name }}</h1>
<p>{{ $project->description }}</p>

<h3>Issues</h3>
<ul>
    @foreach($project->issues as $issue)
        <li><a href="{{ route('issues.show',$issue->id) }}">{{ $issue->title }} ({{ $issue->status }})</a></li>
    @endforeach
</ul>
@endsection
