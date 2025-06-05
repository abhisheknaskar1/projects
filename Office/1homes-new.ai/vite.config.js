import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/style.css',
                'resources/assets/css/responsive.css',
                'resources/assets/css/slider.css',
            ],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        exclude: ['bootstrap']
    }
});
