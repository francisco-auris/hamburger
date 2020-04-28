import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/pages/Home'
import Detail from '@/pages/Detail'
import Lista from '@/pages/Lista'
import Login from '@/pages/Login'
import NotAuthorization from '@/pages/NotAuthorization'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Login,
      meta: {auth: false}
    },
    {
      path: '/lista',
      name: 'Lista',
      component: Lista,
      beforeEnter: (to, from, next) => {
        const token = localStorage.getItem('user-token')
        if (!token) {
          next(true)
        }else {
          next('/401')
        }
      }
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
      meta: {auth: true}
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    }
  ]
})
