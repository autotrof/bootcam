import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        host: true,
        hmr: {
            host: 'hr.test'
        }
    },
    plugins: [
        vue(),
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
            'resources/css/guest.css',
            'resources/js/guest.js',
        ]),
    ],
});
