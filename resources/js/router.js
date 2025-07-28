import { createRouter, createWebHistory } from 'vue-router';
import TaskList from "./pages/TaskList.vue";
import TaskCreate from "./pages/TaskCreate.vue";
import TaskShow from "./pages/TaskShow.vue";
import TaskEdit from "./pages/TaskEdit.vue";

const routes = [
    {
      path: '/tasks',
      component: TaskList
    },
    {
      path: '/task/create',
      component: TaskCreate
    },
    {
      path: '/task/show/:id',
      component: TaskShow,
      props: true
    },
    {
      path: '/task/edit/:id',
      component: TaskEdit,
      props: true
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;