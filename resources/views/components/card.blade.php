<!-- resources/views/components/card.blade.php -->

@props(['title', 'description', 'image'])

<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
    <img class="w-full" src="{{ $image }}" alt="{{ $title }}">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $title }}</div>
        <p class="text-gray-700 text-base">{{ $description }}</p>
    </div>
</div>

