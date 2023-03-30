<template>
    <small class="text-red-500" v-if="error">{{ error }}</small>
</template>

<script setup>
defineProps(["error"]);
</script>
