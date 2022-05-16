const MainPage = () => import('../pages/MainPage.vue');
const Login = () => import('../components/LoginComponent.vue');
const Register = () => import('../components/RegisterComponent.vue');
const Home = () => import('../components/HomeComponent.vue');
const CreateBook = () => import('../components/CreateBookComponent.vue');
const ShowBook = () => import('../components/ShowBookComponent.vue');

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
        path: '/home',
        component: Home,
        name: "Home",
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/book/create',
        component: CreateBook,
        name: "BookCreate",
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/book/:id',
        component: ShowBook,
        name: "BookShow",
        props: true,
        meta: {
            requiresAuth: true,
        }
    }
];

export default routes;
