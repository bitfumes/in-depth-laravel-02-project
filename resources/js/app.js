import Layout from "@/components/Layout.vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { createApp, h } from "vue";
import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";
import "./bootstrap.js";

createInertiaApp({
    progress: {
        color: "green",
        showSpinner: true,
    },
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout ?? Layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Toast)
            .mount(el);
    },
});
