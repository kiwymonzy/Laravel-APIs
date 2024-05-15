<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a class="underline text-2xl text-gray-800 dark:text-gray-200 hover:text-blue-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{route('projects.index')}}">
                {{ __('Projects') }}
                </a>/{{ $project->name }}
        </h2>

        @if(session('success'))
            <div class="alert alert-success mt-3 font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
                {{ session('success') }}
            </div>
        @endif
    </x-slot>

    <div class="py-12 px-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p><strong>ID: </strong> {{ $project->id }}</p>
                        <p><strong>Name: </strong> {{ $project->name }}</p>
                </div>
            </div>

        <form action="{{ route('projects.index') }}" class="p-6">
            <div class="mb-6 flex justify-end">
                <x-primary-button>
                    {{ __('Back to Projects') }}
                </x-secondary-button>
            </div>
        </form>

        </div>
    </div>
</x-app-layout>
