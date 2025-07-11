<script setup>
import { ref } from 'vue';

</script setup>

<template>
    <form>
        <div class="max-w-xs mx-auto item-center my-2 mx-4">
            <label class="block text-xs text-gray-600 font-medium pt-2">タイトル</label>
            <input class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer">
        </div>
        <div class="max-w-xs mx-auto item-center my-2 mx-4">
            <label class="block text-xs text-gray-600 font-medium pt-2">内容</label>
            <textarea class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer"></textarea>
        </div>
        <div class="max-w-xs mx-auto item-center my-2 mx-4">
            <label class="block text-xs text-gray-600 font-medium pt-2">担当者</label>
            <input class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer">
        </div>        
        <div class="flex justify-center">
            <button type="submit" class="w-xs text-white bg-[var(--color-accent)] border border-black rounded-lg p-[10px] m-3 cursor-pointer">
                追加
            </button>
        </div>    
    </form>
</template>

<style scoped>

</style>