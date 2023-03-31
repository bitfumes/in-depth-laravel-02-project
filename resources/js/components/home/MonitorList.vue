<template>
    <div class="pt-10">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">
                    All your sites
                </h1>
                <p class="mt-2 text-sm text-gray-700">
                    A list of all the users in your account including their
                    name, title, email and role.
                </p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button
                    @click="createSite"
                    type="button"
                    class="block rounded-md bg-indigo-600 py-2 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Add Site
                </button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                >
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th
                                    scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                                >
                                    Name
                                </th>
                                <th
                                    scope="col"
                                    class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"
                                >
                                    URL
                                </th>
                                <th
                                    scope="col"
                                    class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"
                                >
                                    Status
                                </th>
                                <th
                                    scope="col"
                                    class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"
                                >
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <ShowSite
                                v-for="monitor in monitors.data"
                                :key="monitor.id"
                                :monitor="monitor"
                            />
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <Paginate
        :next="monitors.next_page_url"
        :prev="monitors.prev_page_url"
        :currentPage="monitors.current_page"
        :lastPage="monitors.last_page"
        class="mt-4"
    />
</template>

<script setup>
import ShowSite from "@/components/home/ShowSite.vue";
import Paginate from "@/components/Paginate.vue";
import { router } from "@inertiajs/vue3";
defineProps(["monitors"]);

function createSite() {
    router.visit("/site/create");
}
</script>
