const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'group-hover', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
