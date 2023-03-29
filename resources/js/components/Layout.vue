<template>
    <header>
        <span>My App</span>
        <Link href="/about" name="About" component="About"></Link>
        <Link href="/test" name="Test" component="Test"></Link>
        <Link href="/login" name="Login" component="Login"></Link>
        <input placeholder="Search Here" />
        <button>Login</button>
    </header>
    <slot></slot>
    <Footer />
</template>

<script setup>
import Footer from "@/components/Footer.vue";
import Link from "@/components/Link.vue";
</script>
