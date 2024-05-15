@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Task List</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Create Task</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Project</th>
                    <th>Staff</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->description ?: 'Not available' }}</td>
                        <td>
                            @if ($task->project)
                                {{ $task->project->name }}
                            @else
                                Not assigned
                            @endif
                        </td>
                        <td>
                            @if ($task->staff)
                                {{ $task->staff->name }}
                            @else
                                Not assigned
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
