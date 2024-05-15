<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a class="underline text-2xl text-gray-800 dark:text-gray-200 hover:text-blue-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{route('staffs.index')}}">
            {{ __('Staffs') }}
            </a>/ {{ __('Edit Staff') }}
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
            <form method="POST" action="{{ route('staffs.update', $staff->id) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$staff->name" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$staff->email" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <!-- Phone -->
                <div>
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$staff->phone" required autofocus autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>


                <!-- Address -->
                <div>
                    <x-input-label for="address" :value="__('Address')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$staff->address" required autofocus autocomplete="address" />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3" color="white">
                        {{ __('Update Staff') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
