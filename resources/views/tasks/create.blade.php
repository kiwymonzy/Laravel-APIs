<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <h1>Create Task</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="project_id">Project:</label>
                <select class="form-control" id="project_id" name="project_id">
                    <option value="">Not assigned</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="staff_id">Staff Assigned:</label>
                <select class="form-control" id="staff_id" name="staff_id">
                    <option value="">Not assigned</option>
                    @foreach ($staffs as $staff)
                        <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection

