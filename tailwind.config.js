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
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                lgMobile: '424px', // Custom breakpoint for extra small screens
                mdMobile: '370px',
                smLaptopScreen: '639px', // Custom breakpoint for extra small screens
                xsmallmobile: '318px', // Custom breakpoint for extra small screens
            },
        },
    },

    plugins: [forms],
};
