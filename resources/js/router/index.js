import { createWebHistory, createRouter, useRoute } from 'vue-router';

const Home = () => import('../components/home/index.vue');
const User = () => import('../components/User/index.vue');

const routes = [
    {
        name: "Home",
        path: "/users",
        component: Home,
    },
    {
        name: 'User',
        path: "/users/:user",
        component: User,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;
    next();
})
export default router