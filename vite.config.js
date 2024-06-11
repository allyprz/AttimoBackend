import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/drag-drop.js",
                "resources/js/input-visibility.js",
                "resources/js/multi-tag.js",
                "resources/js/user-count.js",
                "hover-drag-drop.js",
            ],
            refresh: true,
        }),
    ],
});
