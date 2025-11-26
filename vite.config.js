import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/about.css',
                'resources/js/about.js',
                'resources/css/home.css',
                'resources/js/home.js',
                'resources/css/productdetail.css',
                'resources/js/productdetail.js',
                'resources/css/shop.css',
                'resources/js/shop.js',
                'resources/css/transaction.css',
                'resources/js/transaction.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
