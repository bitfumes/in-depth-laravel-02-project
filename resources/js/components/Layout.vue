<template>
    <Head title="Inertia JS"></Head>
    <Navbar />
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <section class="min-h-screen">
            <slot></slot>
        </section>
    </div>
    <Footer />
</template>

<script setup>
import Footer from "@/components/Footer.vue";
import Navbar from "@/components/Navbar.vue";
import { Head } from "@inertiajs/vue3";
</script>
