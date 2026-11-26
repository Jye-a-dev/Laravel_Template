import path from 'node:path';
import { fileURLToPath } from 'node:url';
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import { defineConfig, loadEnv } from 'vite';

const __dirname = path.dirname(fileURLToPath(import.meta.url));

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    const serverPort = Number(env.PORT || env.SERVER_PORT || 5000);

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.ts'],
                refresh: true,
                fonts: [
                    bunny('Instrument Sans', {
                        weights: [400, 500, 600],
                        optimizedFallbacks: false,
                    }),
                ],
            }),
            tailwindcss(),
        ],
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'resources/js'),
            },
        },
        server: {
            host: true,
            origin: 'http://localhost:5173',
            hmr: {
                host: 'localhost',
            },
            watch: {
                ignored: ['**/storage/framework/views/**'],
            },
        },
        preview: {
            port: serverPort,
        },
    };
});
