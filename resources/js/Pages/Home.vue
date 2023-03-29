<template>
    <h1 class="text-lg text-red-500">Home</h1>
    <br />
    <button @click="count++">+</button>{{ count }}
    <button @click="count--">-</button>
</template>

<script></script>

<script setup>
import { ref } from "vue";
const count = ref(0);
</script>
