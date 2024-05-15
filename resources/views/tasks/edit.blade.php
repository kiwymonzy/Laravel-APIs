<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Task</h2>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="project_id">Project:</label>
                <select class="form-control" id="project_id" name="project_id">
                    <option value="">Not assigned</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="staff_id">Staff Assigned:</label>
                <select class="form-control" id="staff_id" name="staff_id">
                    <option value="">Not assigned</option>
                    @foreach ($staffs as $staff)
                        <option value="{{ $staff->id }}" {{ $task->staff_id == $staff->id ? 'selected' : '' }}>
                            {{ $staff->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection
