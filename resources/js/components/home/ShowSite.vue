<template>
    <tr>
        <td
            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0"
        >
            {{ monitor.site_name }}
        </td>
        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
            {{ monitor.site_url }}
        </td>
        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
            <span
                v-if="monitor.status"
                class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800"
                >Up</span
            >
            <span
                v-else
                class="inline-flex items-center rounded-full bg-purple-100 px-2.5 py-0.5 text-xs font-medium text-purple-800"
                >Down</span
            >
        </td>
        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
            {{ monitor.role }}
        </td>
        <td
            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
        >
            <button
                @click="destroy(monitor.id)"
                class="text-red-600 hover:text-red-900 mr-2"
            >
                Delete
            </button>
            <Link
                :href="`/site/${monitor.id}/edit`"
                class="text-indigo-600 hover:text-indigo-900"
                >Edit</Link
            >
        </td>
    </tr>
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";
import { onMounted } from "vue";
const props = defineProps(["monitor"]);

function destroy(id) {
    if (!confirm("Are you sure you want to delete it??")) return;
    router.delete(`/site/${id}`);
}

onMounted(() => {
    Echo.channel(`status-${props.monitor.id}-changed`).listen(
        "BroadcastStatusChangedEvent",
        (e) => {
            props.monitor.status = e.newStatus;
        }
    );
});
</script>
