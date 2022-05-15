const MainPage = () => import('../pages/MainPage.vue');
const Login = () => import('../components/LoginComponent.vue');
const Register = () => import('../components/RegisterComponent.vue');
const Home = () => import('../components/HomeComponent.vue');

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
        path: '/Home',
        component: Home,
        name: "Home",
        meta: {
            requiresAuth: true,
        }
    }
];

export default routes;
