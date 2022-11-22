import { defineConfig } from "vite";
export default defineConfig({
    build: {
      manifest: true,
      rollupOptions: {
        input: 'resources/scripts/main.js'
      }
    }
  })