<script setup>
import { ref } from 'vue';

import { API_URL } from '../api/globalApi';
import axios from 'axios';
import FlashMessage from '../components/FlashMessage.vue';
import {useFlashMessage} from '../composables/useFlashMessage.js';
import { useRouter } from 'vue-router'; 


const title = ref("");
const content = ref("");
const person = ref("");
const router = useRouter();

const {setFlashMessage} = useFlashMessage();

const submitTask = async () => {
    try{
        await axios.post(API_URL,{
            'title':title.value,
            'content':content.value,
            'person_in_charge':person.value
        });
        setFlashMessage("タスクが正常に追加されました。", "success", true);
        title.value = "";
        content.value = "";
        person.value= "";
        router.push("/tasks");
    }catch (error) {
        setFlashMessage("タスクの追加に失敗しました。", "error", false);
    }
}
</script>

<template>
    <form @submit.prevent="submitTask">
        <FlashMessage />
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">タイトル</label>
            <input v-model="title" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer">
        </div>
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">内容</label>
            <textarea v-model="content" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer"></textarea>
        </div>
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">担当者</label>
            <input v-model="person" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] cursor-pointer">
        </div>
        <div class="flex justify-center">
            <button type="submit" class="w-xs text-white bg-[var(--color-accent)] border border-black rounded-lg p-[10px] mt-4 cursor-pointer">
                追加
            </button>
        </div>
    </form>
</template>