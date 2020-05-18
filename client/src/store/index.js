import Vue from 'vue'
import Vuex from 'vuex'
import Product from './modules/Product'
import user from './modules/user'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    Product,
    user
  }
})
