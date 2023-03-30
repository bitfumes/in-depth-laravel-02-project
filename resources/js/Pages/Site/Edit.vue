<template>
    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">
                    Edit Site
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Add your site for monitoring of uptime.
                </p>
            </div>

            <form
                @submit.prevent="form.patch(`/site/${monitor.id}/update`)"
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2"
            >
                <div class="px-4 py-6 sm:p-8">
                    <div
                        class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6"
                    >
                        <div class="sm:col-span-3">
                            <label
                                for="site_name"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Site name</label
                            >
                            <div class="mt-2">
                                <input
                                    type="text"
                                    name="site_name"
                                    id="site_name"
                                    autocomplete="site_name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.site_name"
                                />
                                <ShowError :error="form.errors.site_name" />
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label
                                for="site_url"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Site Url</label
                            >
                            <div class="mt-2">
                                <input
                                    id="site_url"
                                    name="site_url"
                                    type="site_url"
                                    autocomplete="site_url"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    v-model="form.site_url"
                                />
                                <ShowError :error="form.errors.site_url" />
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8"
                >
                    <Link
                        href="/home"
                        type="button"
                        class="text-sm font-semibold leading-6 text-gray-900"
                    >
                        Cancel
                    </Link>
                    <button
                        type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import ShowError from "@/components/ShowError.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps(["monitor"]);
const form = useForm({
    site_name: props.monitor.site_name,
    site_url: props.monitor.site_url,
});
</script>
