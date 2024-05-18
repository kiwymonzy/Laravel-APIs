@props(['color' => 'red'])

<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-'.$color.'-500 active:bg-'.$color.'-700 focus:outline-none focus:ring-2 focus:ring-'.$color.'-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150', 'style' => 'background-color: '.$color]) }}>
    {{ $slot }}
</a>