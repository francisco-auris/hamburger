import http from '@/http'

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
  }
}

const actions = {
  actionLogin({commit}, user){
    return new Promise((resolve, reject) => {
      http.post('api/login', user)
        .then(res => {
          console.log(res)
          resolve(res.data)
        })
        .catch(err => {
          reject(err)
        })
    })
  }
}

const getters = {

}

export default {
  namespaceed: true,
  state,
  actions,
  getters,
  mutations
}

