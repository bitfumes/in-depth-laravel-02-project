<template>
    <div
        v-if="!createMonitor"
        class="relative block w-full rounded-lg border-2 border-dashed border-indigo-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
    >
        <span class="mt-2 block text-sm font-semibold text-indigo-900"
            >To add more site for monitoring, please subscribe to paid
            plan.</span
        >
        <Link
            href="/subscribe"
            method="post"
            type="button"
            class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-4"
        >
            Subscribe
        </Link>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    computed: {
        createMonitor() {
            return this.$page.props.auth.user?.can.createMonitor;
        },
    },
    components: { Link },
};
</script>
