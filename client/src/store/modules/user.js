import { http } from '@/api/http'

const state = {
  token: "",
  user: {}
}

const mutations = {
  SET_TOKEN (state, token) {
    state.token = token
  },

  SET_USER (state, user) {
    state.user = user
  },

  USER_LOGOUT (state) {
    state.token = ''
    state.user = {}
  }
}

const actions = {
  actionLogin({commit}, user){
    return new Promise((resolve, reject) => {
      http.post('api/login', user)
        .then(res => {
          //console.log(res)
          commit('SET_TOKEN', res.data.access_token)
          commit('SET_USER', res.data.user[0])
          resolve(res.data)
        })
        .catch(err => {
          reject(err)
        })
    })
  }
}

const getters = {
  getUser: (state) => state.user,
  getToken: (state) => state.token
}

export default {
  namespaced: true,
  state,
  actions,
  getters,
  mutations
}

