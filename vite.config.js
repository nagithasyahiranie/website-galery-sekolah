import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel(),
        vue(),
    ],
    server: {
        proxy: {
            '/app': 'http://localhost',
        },
    },
});
