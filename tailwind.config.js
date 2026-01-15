import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    safelist: [
    'animate-spin',
    'bg-opacity-50',
    'bg-gray-900',
    'z-50',
    'fixed',
    'inset-0',
    'flex',
    'items-center',
    'justify-center',
    'text-white'
  ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'auth': "url('https://auth.investta.com/assets/images/login-bg.png')"
            },
            borderRadius: {
                'large': '2.875rem'
            }
        },
    },

    plugins: [forms, typography],
};
