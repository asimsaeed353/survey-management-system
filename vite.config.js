import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    // base: '/',
    // server: {
    //     host: '0.0.0.0',
    //     port: 5173,
    //     hmr: {
    //         host: '192.168.50.216', // Change this value for your local network ip address
    //         // port: 8000, // Or your app's standard port
    //     },
    // },

    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
