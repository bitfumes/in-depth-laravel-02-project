<template>
    <div style="margin-top: 400px">
        <Link href="/about" name="About" component="About"></Link>
        <Link href="/test" name="Test" component="Test"></Link>
    </div>
</template>

<script setup>
import Link from "@/components/Link.vue";
</script>

<style>
.active {
    text-decoration: underline;
    color: yellow;
}
</style>
