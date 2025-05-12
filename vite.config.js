import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost'
        },
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        watch: {
            usePolling: true
        }
    },
    build: {
        chunkSizeWarningLimit: 1600,
        outDir: 'public/build',
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            '~': '/resources',
            'ziggy-js': path.resolve('vendor/tightenco/ziggy'),
        }
    }
});
