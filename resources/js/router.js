import Vue from 'vue'
import VueRouter from 'vue-router'
import VueMeta from 'vue-meta'
Vue.use(VueRouter)
Vue.use(VueMeta)

import * as auth from './services/auth'

/* Site Components */
import Index from './components/pages/site/Index'
import Home from './components/pages/site/Home'
import Events from './components/pages/site/Events'
import News from './components/pages/site/News'
import Faqs from './components/pages/site/Faqs'

/* Auth Components */
import Register from './components/pages/auth/Register'
import ResetPassword from './components/pages/auth/ResetPassword'

/* Admin Components */
import AdminIndex from './components/pages/admin/Index'
import AdminHome from './components/pages/admin/Home'
import AdminEvents from './components/pages/admin/Events'
import AdminNews from './components/pages/admin/News'
import AdminFaqs from './components/pages/admin/Faqs'
import AdminUsers from './components/pages/admin/Users'

/* Errors Components */
import Forbidden from './components/pages/errors/403'
import NotFound from './components/pages/errors/404'

const routes = [
    {
        path: '/',
        component: Index,
        children: [
            {
                path: '',
                name: 'home',
                component: Home
            },
            {
                path: '/events',
                name: 'events',
                component: Events,
            },
            {
                path: '/news',
                name: 'news',
                component: News,
            },
            {
                path: '/faqs',
                name: 'faqs',
                component: Faqs
            },
            /* Auth */
            {
                path: '/register',
                name: 'register',
                component: Register,
                beforeEnter(to, from, next) {
                    if(!auth.isLoggedIn()) {
                        next()
                    } else {
                        next('/')
                    }
                }
            },
            {
                path: '/reset-password/:email',
                name: 'reset-password',
                component: ResetPassword,
                beforeEnter(to, from, next) {
                    if (!auth.isLoggedIn()) {
                        next();
                    } else {
                        next('/');
                    }
                }
            },
            
        ],
    },
    /* Admin */
    {
        path: '/admin',
        component: AdminIndex,
        children: [
            {
                path: '/',
                name: 'admin_home',
                component: AdminHome,
                beforeEnter(to, from, next) {
                    if(auth.getUserRole() === 'admin') {
                        next();
                    } else {
                        next('/403')
                    }
                }
            },
            {
                path: 'events',
                name: 'admin_events',
                component: AdminEvents,
                beforeEnter(to, from, next) {
                    if(auth.getUserRole() === 'admin') {
                        next();
                    } else {
                        next('/403')
                    }
                }
            },
            {
                path: 'news',
                name: 'admin_news',
                component: AdminNews,
                beforeEnter(to, from, next) {
                    if(auth.getUserRole() === 'admin') {
                        next();
                    } else {
                        next('/403')
                    }
                }
            },
            {
                path: 'faqs',
                name: 'admin_faqs',
                component: AdminFaqs,
                beforeEnter(to, from, next) {
                    if(auth.getUserRole() === 'admin') {
                        next();
                    } else {
                        next('/403')
                    }
                }
            },
            {
                path: 'users',
                name: 'admin_users',
                component: AdminUsers,
                beforeEnter(to, from, next) {
                    if(auth.getUserRole() === 'admin') {
                        next();
                    } else {
                        next('/403')
                    }
                }
            }
        ],
        beforeEnter(to, from, next) {
            if(auth.getUserRole() === 'admin') {
                next();
            } else {
                next('/403')
            }
        }
    },
    /* Errors */
    {
        path: '/403',
        name: '403',
        component: Forbidden
    },
    {
        path: '*',
        name: '404',
        component: NotFound
    }
]

export default new VueRouter({
    mode: 'history',
    linkExactActiveClass: "active",
    routes
})
