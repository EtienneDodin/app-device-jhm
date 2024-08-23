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
    ],

    theme: {
        extend: {
            fontFamily: {
                akazan: ['akazan', ...defaultTheme.fontFamily.sans],
                barlow: ['barlow', ...defaultTheme.fontFamily.sans],
                proxima: ['proxima_novamedium', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '7xl': '80rem',
            },
            colors: {
                'light-blue': '#30B6EA',
                'main-blue': '#007991',
                'dark-blue': '#394C68',
                'light-gray': '#F4F4F4',
                'main-gray': '#E0E0E0',
                'anthracite-grey': '#A9B0BC',
                'light-orange': '#FDA13B',
                'main-orange': '#FD8149',
                'red': '#FD5555',
            },
        },
    },

    plugins: [forms, typography],
};
