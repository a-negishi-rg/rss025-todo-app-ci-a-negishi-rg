<script setup>
const props = defineProps({
    name: String,
    link: String,
});
</script>

<template>
    <div>
        <button  @click="() => $router.push({ path: props.link })" class="float-left m-2 px-4 py-2 bg-white text-xs font-medium shadow-sm border border-[var(--color-input-border)] rounded-md hover:bg-gray-200 active:outline-offset-1 active:outline-2 active:outline-[var(--color-accent)]">
            {{ props.name }}
        </button>
    </div>
</template>
