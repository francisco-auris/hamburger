import Vue from 'vue'
import VueResource from 'vue-resource'
import user from '@/store/modules/user'

Vue.use(VueResource)

const http = Vue.http

http.options.root = 'http://localhost:8000'

http.interceptors.push(function(request,next){

  // modifying request headers
  request.headers.set('Authorization', `Bearer ${user.state.token}`);

  next();
})

export { http }
