// import ApiProduct from '../../api/ApiProduct'
import { http } from '../../api/http'
//import http from '@/http'

const state = () => ({
  all: []
})

const getters = {
  getProduct: (state) => id => {
    return state.all.find(dados => dados.id === id)
  },
  getAll (state) {
    return state.all
  }
}

const mutations = {
  setProducts (state, products) {
    state.all = products
  }
}

const actions = {
  getAllProducts ({commit}) {
    // let model = new ApiProduct();
    return http.get('api/produto').then(res => {
      commit('setProducts', res.data)
      //console.log(res)
    })
    .catch(err => console.log('error',err))
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
