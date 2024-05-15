<!-- resources/views/projects/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
        @if(session('success'))
            <div class="alert alert-success mt-3 font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
                {{ session('success') }}
            </div>
        @endif
    </x-slot>

    <div class="py-12 px-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="mb-6 flex justify-end">
                    <x-page-link :href="route('projects.create')" color="blue">
                        {{ __('Create Projects') }}
                    </x-page-link>
                </div>            
                <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Our Projects
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
                    </caption>

                    
        <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-15 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $project->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $project->name }}
                            </td>

                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-page-link :href="route('projects.show', $project->id)" color="blue">
                                        {{ __('View') }}
                                    </x-page-link>
                                    <x-page-link :href="route('projects.destroy', $project->id)" color="green">
                                        {{ __('Edit') }}
                                    </x-page-link>

                                    <x-primary-button :jsAlert="true" color="red" alertMessage="Are you sure you want to delete this project?">
                                        {{ __('Delete') }}
                                    </x-primary-button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</x-app-layout>
