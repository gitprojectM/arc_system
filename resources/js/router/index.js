import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home';
//import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';


//import Books from '../components/Books';
//import AddBook from '../components/AddBook';
//import EditBook from '../components/EditBook';

import Program from '../components/review_program/Index';

export const routes = [
    {
        name: 'home',
        path: '/home',
        component: Home
    },
   
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'program',
        path: '/program',
        component: Program
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
