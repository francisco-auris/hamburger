import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/pages/Home'
import Detail from '@/pages/Detail'
import Lista from '@/pages/Lista'
import Login from '@/pages/Login'
import Register from '@/pages/Registro'
import NotAuthorization from '@/pages/NotAuthorization'
import Cart from '@/pages/Cart'
import Perfil from '@/pages/Perfil'
import Teste from '@/pages/Teste'

import user from '@/store/modules/user'

Vue.use(VueRouter)

const routes = [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/teste',
      name: 'Teste',
      component: Teste,
      meta: { public: true }
    },
    {
      path: '/register',
      name: 'Register',
      component: Register,
      meta: { public: true }
    },
    {
      path: '/lista',
      name: 'Lista',
      component: Lista,
    },
    {
      path: '/401',
      name: 'NotAuthorization',
      component: NotAuthorization
    },
    {
      path: '/detail/:id',
      name: 'Detail',
      component: Detail,
    },
    {
      path: '/login',
      name: 'Login',
      component: Login,
      meta: { public: true }
    },
    {
      path: '/cart',
      name: 'Cart',
      component: Cart
    },
    {
      path: '/perfil',
      name: 'Perfil',
      component: Perfil
    }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

router.beforeEach((routeTo, routeFrom, next) => {
  if (!routeTo.meta.public && !user.state.token) {
    return next({
      path:'/login'
    });
  }
  next();
})

export default router
