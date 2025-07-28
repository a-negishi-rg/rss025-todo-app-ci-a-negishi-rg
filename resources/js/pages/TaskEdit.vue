<script setup>
import {  onMounted, ref } from 'vue';
import { API_URL } from '../api/globalApi';
import axios from 'axios';
import FlashMessage from '../components/FlashMessage.vue';
import { useFlashMessage } from '../composables/useFlashMessage.js';
import { useRouter } from 'vue-router';
const {setFlashMessage} = useFlashMessage();

const title = ref("");
const content = ref("");
const person_in_charge = ref("");
const router = useRouter();
const message = ref({});
const status = ref({});

const props = defineProps({
    id: String,
});
const task = ref([]);

onMounted(() => {
    getTasks();
});

const getTasks = async () => {
    try {
        const response = await axios.get(`${API_URL}/edit/${props.id}`);
        task.value = response.data;
        title.value = task.value.title;
        content.value = task.value.content;
        person_in_charge.value = task.value.person_in_charge;
    } catch (error) {
        console.error('データの取得に失敗しました:', error);
    }
}

const submitTask = async () => {
    try {
        await axios.put(`${API_URL}/update/${props.id}`,{
            'title':title.value,
            'content':content.value,
            'person_in_charge':person_in_charge.value
        });
        setFlashMessage("タスクが正常に更新されました。", "success", true);
        router.push("/tasks");
    }catch (error) {
        status.value = error.response.status;
        if(status.value == 422){
            message.value = error.response.data.errors;
            setFlashMessage("入力欄を確認してください。", "error", false);
        }else{
            setFlashMessage("タスクの更新に失敗しました。", "error", false);
        }
    }
}
</script>

<template>
    <form @submit.prevent="submitTask">
        <FlashMessage />
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">タイトル</label>
            <input v-model="title" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer"
                :class="{ 'focus:ring-red-500 border-red-500': message.title }">
            <span class="block m-1 text-red-500 text-xs">{{ message.title?.[0] }}</span>
        </div>
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">内容</label>
            <textarea v-model="content" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer"
                :class="{ 'focus:ring-red-500 border-red-500': message.content }">
            </textarea>
            <span class="block m-1 text-red-500 text-xs">{{ message.content?.[0] }}</span>
        </div>
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">担当者</label>
            <input v-model="person_in_charge" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer"
                :class="{ 'focus:ring-red-500 border-red-500': message.person_in_charge }">
            <span class="block m-1 text-red-500 text-xs">{{ message.person_in_charge?.[0] }}</span>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="w-xs text-white bg-[var(--color-accent)] border border-black rounded-lg p-[10px] mt-4 cursor-pointer">
                保存
            </button>
        </div>
    </form>
</template>