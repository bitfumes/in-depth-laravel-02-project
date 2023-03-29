<template>
    <MonitorList :monitors="monitors" />
</template>

<script></script>

<script setup>
import MonitorList from "@/components/home/MonitorList.vue";
defineProps(["monitors"]);
</script>
