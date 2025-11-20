import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/css/app.css',
                'resources/css/navigation.css',
                'resources/css/alumni.css',
                'resources/css/modern-navigation.css',
                'resources/js/app.js',
                'resources/js/modern-navigation.js'
            ],
            refresh: true,
        }),
    ],
});
