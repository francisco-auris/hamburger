import Vue from 'vue'
import Vuex from 'vuex'
import Teste from './modules/Teste'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    Teste
  }
})
