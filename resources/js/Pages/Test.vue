<template>
    Hello
    <button @click="count++">+</button>{{ count }}
    <button @click="count--">-</button>
</template>

<script>
export default {
    data() {
        return {
            count: 0,
        };
    },
};
</script>
