import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                mono: ['"Fira Code"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                'neon-green': '#00ff41',
                'neon-blue': '#00b8ff',
                'dark-bg': '#0d1117',
                'terminal-black': '#0a0a0a',
            },
        },
    },

    plugins: [forms],
};
