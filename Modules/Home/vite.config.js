import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        outDir: '../../public/build-home',
        emptyOutDir: true,
        manifest: true,
    },

    plugins: [
        laravel({
            publicDirectory: '../../public',
            buildDirectory: 'build-home',

            input: [
                __dirname + '/resources/assets/css/index.css',
                __dirname + '/resources/assets/js/app.js',
            ],

            refresh: true,
        }),
    ],
});
