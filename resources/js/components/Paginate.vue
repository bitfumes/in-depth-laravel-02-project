<template>
    <nav
        class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0"
    >
        <div class="-mt-px flex w-0 flex-1">
            <Link
                :href="prev"
                :class="
                    prev === null
                        ? 'text-gray-300 cursor-default'
                        : 'text-gray-500 cursor-pointed hover:border-gray-300 hover:text-gray-700'
                "
                class="inline-flex items-center border-t-2 border-transparent pt-4 pr-1 text-sm font-medium"
            >
                <ArrowLongLeftIcon
                    class="mr-3 h-5 w-5 text-gray-400"
                    aria-hidden="true"
                />
                Previous
            </Link>
        </div>
        <div class="hidden md:-mt-px md:flex">
            <a
                v-for="num in lastPage"
                :key="num"
                href="#"
                :class="
                    currentPage == num
                        ? 'inline-flex items-center border-t-2 border-indigo-500 px-4 pt-4 text-sm font-medium text-indigo-600'
                        : 'inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700'
                "
                >{{ num }}</a
            >
        </div>
        <div class="-mt-px flex w-0 flex-1 justify-end">
            <Link
                :href="next"
                :class="
                    next === null
                        ? 'text-gray-300 cursor-default'
                        : 'text-gray-500 cursor-pointed hover:border-gray-300 hover:text-gray-700'
                "
                class="inline-flex items-center border-t-2 border-transparent pt-4 pl-1 text-sm font-medium"
            >
                Next
                <ArrowLongRightIcon
                    class="ml-3 h-5 w-5 text-gray-400"
                    aria-hidden="true"
                />
            </Link>
        </div>
    </nav>
</template>

<script setup>
import { ArrowLongLeftIcon, ArrowLongRightIcon } from "@heroicons/vue/20/solid";
import { Link } from "@inertiajs/vue3";
defineProps(["next", "prev", "currentPage", "lastPage"]);
</script>
