<script setup>
import { ref } from 'vue';

const tasks = ref([
    {
     id: 1,
     title: "環境構築",
     content: "これから実装するToDoの環境構築を行う。",
     person_in_charge: "田中 一郎"
    },
    {
     id: 2,
     title: "一覧画面",
     content: "一覧画面の見た目（フロントエンド）と、DBからデータを取得する処理（バックエンド）を実装する。フロントではまず仮のデータでテーブル表示を実装し、その後、バックエンドが作成したAPIを呼び出して本物のデータに置き換える。最終的に、tasksテーブルに登録されている情報がブラウザに一覧表示される状態を目指す。",
     person_in_charge: "山田 太郎",
    },
    {
     id: 3,
     title: "登録画面",
     content: "タスクを登録するための画面作成と、DBにデータを保存する登録処理を実装する。",
     person_in_charge: "佐藤 花子"
    },
    {
     id: 4,
     title: "バリデーション",
     content: "タスク登録時、入力されたデータが要件を満たしているかチェックする検証処理（バリデーション）を実装する。",
     person_in_charge: "鈴木 次郎"
    }
])
</script setup>

<template>
    <div class="m-4">
        <table class="text-left table-fixed w-full">
            <thead>
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="p-4 overflow-hidden whitespace-nowrap">番号</th>
                    <th class="p-4 overflow-hidden whitespace-nowrap">タイトル</th>
                    <th class="p-4 overflow-hidden whitespace-nowrap">内容</th>
                    <th class="p-4 overflow-hidden whitespace-nowrap">担当者</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" class="text-left border-b-2 border-gray-300 hover:bg-(--color-sub)">
                    <td class="p-4 overflow-hidden whitespace-nowrap"> {{ task.id }} </td>
                    <td class="p-4 overflow-hidden whitespace-nowrap"> {{ task.title }} </td>
                    <td class="p-4 overflow-hidden whitespace-nowrap"> {{ task.content }} </td>
                    <td class="p-4 overflow-hidden whitespace-nowrap"> {{ task.person_in_charge }} </td>
                </tr>
            </tbody>
        </table>
    </div>    
</template>

<style scoped>
table {
    box-shadow: 5px 5px 13px #e5e7eb,
                -5px -5px 13px -2px #e5e7eb inset;
}
</style>