import Vue from 'vue';
import Auth from '../resources/Auth.js';
import VueRouter from 'vue-router';
import routes from './routes';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

router.beforeEach((to, from, next) => {
   if (to.matched.some(record => record.meta.requiresAuth) ) {
       if (Auth.check()) {
           next();
           return;
       } else {
           router.push({ name: 'Login' });
       }
   } else {
       next();
   }
});

export default router;
