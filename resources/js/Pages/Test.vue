<template>
    Hello
    <br />
    <button @click="count++">+</button>{{ count }}
    <button @click="count--">-</button>
</template>

<script></script>

<script setup>
import { ref } from "vue";
const count = ref(0);
</script>
