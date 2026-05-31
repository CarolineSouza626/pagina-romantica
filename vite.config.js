import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const isNetlify = process.env.NETLIFY === 'true';
const publicDirectory = isNetlify ? '.' : 'public';
const buildDirectory = isNetlify ? 'dist' : 'build';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
      publicDirectory,
      buildDirectory,
    }),
  ],
  build: {
    copyPublicDir: false,
  },
});
