<script setup>
import { onMounted, ref } from 'vue';
import { API_URL } from '../api/globalApi.js';
import axios from 'axios';
import Button from '../components/Button.vue';

const props = defineProps({
    id: Number,
});
const task = ref([]);

onMounted(() => {
    getTasks();
});

const getTasks = async () => {
    try {
        const response = await axios.get(`${API_URL}/show/${props.id}`);
        task.value = response.data;
    } catch (error) {
        console.error('データの取得に失敗しました:', error);
    }
}
</script>

<template>
    <div class="max-w-xs mx-auto item-center">
        <label class="block text-xs text-gray-600 font-medium mt-4">タイトル</label>
        <input :value="task.title" readonly class="w-full border rounded-lg py-2 px-4 focus:outline-none">
    </div>
    <div class="max-w-xs mx-auto item-center">
        <label class="block text-xs text-gray-600 font-medium mt-4">内容</label>
        <textarea :value="task.content" readonly class="w-full border rounded-lg py-2 px-4 focus:outline-none">
        </textarea>
    </div>
    <div class="max-w-xs mx-auto item-center">
        <label class="block text-xs text-gray-600 font-medium mt-4">担当者</label>
        <input :value="task.person_in_charge" readonly class="w-full border rounded-lg py-2 px-4 focus:outline-none">
    </div>
    <div class="flex justify-center">
        <Button name="戻る" link="/tasks" class="block text-center w-xs mt-4 cursor-pointer"/>
    </div>
</template>