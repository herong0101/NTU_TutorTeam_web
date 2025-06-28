import { defineConfig } from 'vite'
import liveReload from 'vite-plugin-live-reload'
// const { resolve } = require('path')
import { resolve } from "path"

export default defineConfig({
  plugins: [
    liveReload(__dirname + '/**/*.php')
  ],
  root: '',
  base: process.env.NODE_ENV === 'development'
    ? '/wp-content/themes/seed/'
    : '/wp-content/themes/seed/dist/',
  build: {
    outDir: resolve(__dirname, './dist'),
    emptyOutDir: true,
    manifest: true,
    target: 'es2018',
    rollupOptions: {
      input: {
        main: resolve(__dirname, './assets/src/main.js')
      },
      output: {
          entryFileNames: `[name].js`,
          chunkFileNames: `[name].js`,
          assetFileNames: `[name].[ext]`
      }
    },
    minify: true,
    write: true
  },
  server: {
    cors: true,
    strictPort: true,
    port: 3000,
    https: false,
    hmr: {
      host: '127.0.0.1',
    },
  }
})