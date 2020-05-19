import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/pages/Home'
import Detail from '@/pages/Detail'
import Lista from '@/pages/Lista'
import Login from '@/pages/Login'
import Register from '@/pages/Registro'
import NotAuthorization from '@/pages/NotAuthorization'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/register',
      name: 'Register',
      component: Register,
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
      component: Login
    }
  ]
})
