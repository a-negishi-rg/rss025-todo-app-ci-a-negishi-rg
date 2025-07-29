<script setup>
import { onMounted, ref } from 'vue';
import { API_URL } from '../api/globalApi.js';
import axios from 'axios';
import FlashMessage from '../components/FlashMessage.vue';
import { useFlashMessage } from '../composables/useFlashMessage.js';
import Pencil from '../components/icons/Pencil.vue';
import Trash from '../components/icons/Trash.vue';

const tasks = ref([]);
const {setFlashMessage} = useFlashMessage();

onMounted(() => {
    getTasks();
});

const getTasks = async () => {
    try {
        const response = await axios.get(API_URL);
        tasks.value = response.data;
    } catch (error) {
        console.error('データの取得に失敗しました:', error);
    }
}

const deleteTask = async (id) => {
    if (window.confirm('本当にこのタスクを削除してもよろしいですか？')){
        try {
            await axios.post(`${API_URL}/delete/${id}`);
            setFlashMessage("タスクが正常に削除されました。", "success", false);
            getTasks();
        } catch (error) {
            setFlashMessage("タスクの削除に失敗しました。", "error", false);
        }
    };
}
</script>

<template>
    <FlashMessage />
    <div class="m-4">
        <table class="text-left table-fixed w-full">
            <thead>
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="p-4 overflow-hidden whitespace-nowrap">番号</th>
                    <th class="p-4 overflow-hidden whitespace-nowrap">タイトル</th>
                    <th class="p-4 overflow-hidden whitespace-nowrap">内容</th>
                    <th class="p-4 overflow-hidden whitespace-nowrap">担当者</th>
                    <th class="p-4 w-1/10">詳細</th>
                    <th class="p-4 w-1/10">編集</th>
                    <th class="p-4 w-1/10">削除</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" class="text-left border-b-2 border-gray-300 hover:bg-(--color-sub)">
                    <td class="p-4 overflow-hidden whitespace-nowrap">{{ task.id }}</td>
                    <td class="p-4 overflow-hidden whitespace-nowrap">{{ task.title }}</td>
                    <td class="p-4 overflow-hidden whitespace-nowrap">{{ task.content }}</td>
                    <td class="p-4 overflow-hidden whitespace-nowrap">{{ task.person_in_charge }}</td>
                    <td class="w-1/10">
                        <RouterLink :to="`/task/show/${ task.id }`" class="inline-flex items-center m-2 px-4 py-2 bg-white text-xs font-medium shadow-sm border border-[var(--color-input-border)] rounded-md hover:bg-gray-200 active:outline-offset-1 active:outline-2 active:outline-[var(--color-accent)]">
                            詳細
                        </RouterLink>
                    </td>
                    <td class="w-1/10">
                        <RouterLink :to="`/task/edit/${ task.id }`" class="inline-flex items-center m-2 px-4 py-2 bg-white text-xs font-medium shadow-sm border border-[var(--color-input-border)] rounded-md hover:bg-gray-200 active:outline-offset-1 active:outline-2 active:outline-[var(--color-accent)]">
                            <span class="w-4 h-4 mr-1"><Pencil /></span>
                            編集
                        </RouterLink>
                    </td>
                    <td class="w-1/10">
                        <button @click="deleteTask(task.id)" class="inline-flex items-center m-2 px-4 py-2 bg-[var(--color-error)] text-xs text-white font-medium shadow-sm border border-[var(--color-error)] rounded-md hover:bg-[#c7310a] active:outline-offset-1 active:outline-2 active:outline-[#c7310a] cursor-pointer">
                            <span class="w-4 h-4 mr-1"><Trash /></span>
                            削除
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
table {
    box-shadow: 5px 5px 13px var(--color-shadow-light),
                -5px -5px 13px -2px var(--color-shadow-dark) inset;
}
</style>