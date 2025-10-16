@extends('layout')

@section('title','Create Project')

@section('content')
<h1>Create Project</h1>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
