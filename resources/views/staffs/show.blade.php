<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a class="underline text-2xl text-gray-800 dark:text-gray-200 hover:text-blue-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{route('staffs.index')}}">
                {{ __('Staffs') }}
                </a>/{{ $staff->name }}
        </h2>

        @if(session('success'))
            <div class="alert alert-success mt-3 font-semibold text-sm text-gray-800 dark:text-gray-200 leading-tight">
                {{ session('success') }}
            </div>
        @endif
    </x-slot>

    <div class="py-12 px-6">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="https://source.unsplash.com/500x500/?electricity" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><strong>Name: </strong> {{ $staff->name }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Email: </strong> {{ $staff->email }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Phone: </strong> {{ $staff->phone ?: 'Not available' }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><strong>Address: </strong> {{ $staff->address ?: 'Not available' }}</p>
                </div>
                <div class="mb-6 flex justify-center">
                    <form action="{{ route('staffs.destroy', $staff->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                        <x-page-link :href="route('staffs.edit', $staff->id)" color="green">
                                                {{ __('Edit') }}
                        </x-page-link>

                        <x-primary-button :jsAlert="true" color="red" alertMessage="Are you sure?">
                                                {{ __('Delete') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

