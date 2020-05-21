import { http } from '@/api/http'

const state = {
  all: []
}

const mutations = {
  SET_ALL (state, items) {
    state.all = items
  },

  ADD_ADDRESS (state, item) {
    state.all.push(item)
  }

}

const actions = {
  pushAllAddress ({commit, rootState}) {
    //console.log('user >>> '+rootState.user.user.id)
    return new Promise((resolve, reject) => {
      http.get('api/user-address/'+rootState.user.user.id)
      .then(res => {
        commit('SET_ALL', res.data)
        resolve(res.data)
      })
      .catch(err => {
        reject(err)
      })
    })
  },
  actionCreate ({commit}, address) {
    return new Promise((resolve, reject) => {
      http.post('api/address', address)
        .then(res => {
          commit('ADD_ADDRESS', address)
          resolve(res)
        })
        .catch(err => {
          reject(err)
        })
    })
  }
}

const getters = {
  getAll(state) {
    return state.all
  }
}

export default {
  namespaced: true,
  state,
  actions,
  mutations,
  getters
}
