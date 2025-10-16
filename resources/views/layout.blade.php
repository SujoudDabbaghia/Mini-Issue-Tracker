<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'IssueFlow')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <nav class="mb-3">
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Projects</a>
        <a href="{{ route('issues.index') }}" class="btn btn-secondary">Issues</a>
    </nav>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>
</body>
</html>
