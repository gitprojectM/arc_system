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
import Registration from '../components/student/reg';
import Registrations from '../components/student/Regs';
import users from '../components/user/index';
import Course from '../components/course/index';
import Enrollmemt from '../components/enrollment/enroll_form';
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
    {
        name: 'registration',
        path: '/reg',
        component: Registration
    },
    {
        name: 'registrations',
        path: '/regs',
        component: Registrations
    },
    {
        name: 'users',
        path: '/users',
        component: users
    },
    {
        name: 'course',
        path: '/course',
        component: Course
    },
    {
        name: 'enroll',
        path: '/enroll',
        component: Enrollmemt
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
