import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors: {
          gray: colors.coolGray,
          blue: colors.lightBlue,
          red: colors.rose,
          pink: colors.fuchsia,
        },
        fontFamily: {
          sans: ['Graphik', 'sans-serif'],
          serif: ['Merriweather', 'serif'],
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },      
            spacing: {
              '128': '32rem',
              '144': '36rem',
            },
            borderRadius: {
              '4xl': '2rem',
            }
        },
    },

      // make sure to safelist these classes when using purge
      safelist: [
        'w-64',
        'w-1/2',
        'rounded-l-lg',
        'rounded-r-lg',
        'bg-gray-200',
        'grid-cols-4',
        'grid-cols-7',
        'h-6',
        'leading-6',
        'h-9',
        'leading-9',
        'shadow-lg'
      ],

    plugins: [
    forms,// include Flowbite as a plugin in your Tailwind CSS project
    require('flowbite/plugin')],
};
