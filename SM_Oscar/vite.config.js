import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/js/app.js', 
                    'resources/css/departamentos.css', 
                    'resources/js/departamentos.js', 
                    'resources/css/investigacion.css', 
                    'resources/js/investigacion.js'],
            refresh: true,
        }),
    ],
});
