import Login from '../components/login.vue';
import Register from '../components/register.vue';
import Dashboard from '../components/dashboard.vue';

import MainPage from '../pages/MainPage.vue';

const routes = [
    {
        path: '/',
        component: MainPage,
        name: "MainPage"
    },
    {
        path: '/login',
        component: Login,
        name: "Login"
    },
    {
        path: '/register',
        component: Register,
        name: "Register"
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: "Pagina Inicial",
        meta: {
            requiresAuth: true,
        }
    }
];

export default routes;
