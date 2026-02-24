import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    // server: {
    //     host: "127.0.0.1",
    //     port: 5173, // or any other port you prefer
    // },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/sass/app.scss",
            ],
            refresh: true,
        }),
    ],
    // build: {
    //     outDir: "public/build",
    //     // outDir: "build",
    // },
});
