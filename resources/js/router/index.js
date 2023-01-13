import { createWebHistory, createRouter } from 'vue-router';

const Home = () => import('../components/home/index.vue');
const User = () => import('../components/User/index.vue');

const routes = [
    {
        path: "/",
        redirect: "/users",
        name: "Home",
    },
    {
        name: "Users",
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
    document.title = to.name;
    next();
})
export default router