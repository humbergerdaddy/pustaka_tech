import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        https: true, // ini untuk dev mode
    },
    build: {
        manifest: true,
        outDir: 'public/build',  // Laravel expects manifest here
        assetsDir: 'assets',     // Optional but useful
        emptyOutDir: true,       // Clean before build
    },
});
