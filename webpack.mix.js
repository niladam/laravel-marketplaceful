const mix = require('laravel-mix');
const src = 'resources';
const dest = 'resources/dist';

mix.setPublicPath('./resources/dist');

mix.postCss(`${src}/css/dashboard.css`, `${dest}/css`, [
    require('postcss-import'),
    require('tailwindcss'),
]);
