import { createRouter, createWebHistory } from 'vue-router';
import TaskList from "./pages/TaskList.vue";
import TaskCreate from "./pages/TaskCreate.vue";
import TaskShow from "./pages/TaskShow.vue";

const routes = [
    {
      path: '/tasks',
      component: TaskList
    },
    {
      path: '/tasks/create',
      component: TaskCreate
    },
    {
      path: '/tasks/show/:id',
      component: TaskShow,
      props: true
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;