import { createRouter, createWebHistory } from 'vue-router';
import TaskList from "./pages/TaskList.vue";

const routes = [
    {
      path: '/:pathMatch(.*)*', 
      component: TaskList
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;