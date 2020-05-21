import Vue from 'vue'
import Vuex from 'vuex'
import product from './modules/product'
import user from './modules/user'
import cart from './modules/cart'
import address from './modules/address'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    product,
    user,
    cart,
    address
  }
})
