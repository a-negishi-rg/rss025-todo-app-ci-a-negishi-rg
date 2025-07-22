<script setup>
import { ref } from 'vue';

import { API_URL } from '../api/globalApi';
import axios from 'axios';
import FlashMessage from '../components/FlashMessage.vue';
import { useFlashMessage } from '../composables/useFlashMessage.js';
import { useRouter } from 'vue-router'; 


const title = ref("");
const content = ref("");
const person = ref("");
const router = useRouter();
const message = ref({});
const status = ref({});
const validation_error = ref("");

const {setFlashMessage} = useFlashMessage();

const submitTask = async () => {
        try{
            await axios.post(`${API_URL}/submit`,{
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
                message.value = error.response.data.errors;
                status.value = error.response.status;
            if(status.value == 422){
                validation_error.value = true;
                setFlashMessage("入力欄を確認してください。", "error", false);
            }else{
                setFlashMessage("タスクの追加に失敗しました。", "error", false);
            }
        }
}
</script>

<template>
    <form @submit.prevent="submitTask">
        <FlashMessage />
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">タイトル</label>
            <input v-model="title" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] focus:border-[var(--color-accent)] cursor-pointer "
                :class="{'focus:ring-red-500 border-red-500': validation_error}">
                {{ validation_error }}
            <span class="block m-1 text-red-500 text-xs">{{ message.title?.[0]}}</span>
        </div>
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">内容</label>
            <textarea v-model="content" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] focus:border-[var(--color-accent)] cursor-pointer"
                :class="{'focus:ring-red-500 border-red-500': validation_error}">
            </textarea>
            <span class="block m-1 text-red-500 text-xs">{{ message.content?.[0]}}</span>
        </div>
        <div class="max-w-xs mx-auto item-center">
            <label class="block text-xs text-gray-600 font-medium mt-4">担当者</label>
            <input v-model="person" class="w-full border rounded-lg py-2 px-4 focus:outline-none focus:ring focus:ring-[var(--color-accent)] focus:border-[var(--color-accent)] cursor-pointer"
                :class="{'focus:ring-red-500 border-red-500': validation_error}">
            <span class="block m-1 text-red-500 text-xs">{{ message.person_in_charge?.[0]}}</span>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="w-xs text-white bg-[var(--color-accent)] border border-black rounded-lg p-[10px] mt-4 cursor-pointer">
                追加
            </button>
        </div>
    </form>
</template>