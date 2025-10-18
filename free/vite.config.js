import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js'
            ],
            refresh: [
                'routes/**',
                'resources/views/**',
                'resources/js/**',
                'resources/css/**',
                'app/**',
            ],
        }),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '@css': '/resources/css',
            '@components': '/resources/js/components',
        },
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['alpinejs'],
                },
            },
        },
    },
});
