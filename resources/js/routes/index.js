import Homepage from '../pages/Homepage.vue'
import Users from '../pages/Users.vue'

export default [
    {
        path: '/',
        name: 'home',
        component: Homepage,
    },
    {
        path: '/users',
        name: 'users',
        component: Users,
    },
];
