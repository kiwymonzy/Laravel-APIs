<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Task Details</h2>
        <p><strong>ID:</strong> {{ $task->id }}</p>
        <p><strong>Name:</strong> {{ $task->name }}</p>
        <p><strong>Description:</strong> {{ $task->description ?: 'Not available' }}</p>

        @if ($task->project)
            <p><strong>Project:</strong> {{ $task->project->name }}</p>
        @else
            <p><strong>Project:</strong> Not assigned</p>
        @endif

        @if ($task->staff)
            <p><strong>Staff Assigned:</strong> {{ $task->staff->name }}</p>
        @else
            <p><strong>Staff Assigned:</strong> Not assigned</p>
        @endif

        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
