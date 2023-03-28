<template>
    Hello
    <button @click="count++">+</button>{{ count }}
    <button @click="count--">-</button>
    <br />
    <Footer />
</template>

<script setup>
import { ref } from "vue";
import Footer from "./Footer.vue";
const count = ref(0);
</script>
