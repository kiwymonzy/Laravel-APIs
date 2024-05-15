<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Project') }}
        </h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </x-slot>

    <div class="py-12 px-6">        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('projects.store') }}">
                @csrf

                <!-- Project Name -->
                <div>
                    <x-input-label for="name" :value="__('Project Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Create Project') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
