<script setup>
const props = defineProps({
    name: String,
    link: String,
});
</script>

<template>
    <RouterLink :to=link class="float-left m-2 px-4 py-2 bg-white text-xs font-medium shadow-sm border border-[var(--color-input-border)] rounded-md hover:bg-gray-200 active:outline-offset-1 active:outline-2 active:outline-[var(--color-accent)]">
        {{ name }}
    </RouterLink>
</template>
