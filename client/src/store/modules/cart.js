const state = {
  items: []
}

const mutations = {
  ADD_ITEM_CART (state, item) {
    console.log('mutation> '+item)
    state.items.push({
      id: item,
      quantity:1
    })
  },

  REMOVE_ITEM_CART (state, item) {
    //state.items.splice( item, 1 )
    let search = state.items.find( f => f.id == item )
    state.items.splice( search, 1 )
  },

  ICREMENT_PRODUCT (state, item) {
    let search = state.items.find( f => f.id == item )
    search.quantity++
  },

  DECREMENT_PRODUCT (state, item) {
    let search = state.items.find( f => f.id == item )
    search.quantity--
  }
}

const actions = {
  addProductToCart ({ commit, state }, product) {
    console.log('action> '+product)
    commit('ADD_ITEM_CART', product)
  }
}

const getters = {
  vefProductCart: (state) => (id) => {
    return Boolean( state.items.find(f => f.id === id) )
  },

  getItems (state) {
    return state.items
  },

  cartProducts (state, getters, rootState) {
    return state.items.map(({ id, quantity }) => {
      const product = rootState.product.all.find(product => product.id === id)
      return {
        id,
        title: product.title,
        price: product.preco,
        image: product.image,
        quantity
      }
    })
  },

  cartTotalPrice: (state, getters) => {
    /*return getters.cartProducts.reduce((total, product) => {
      return total + product.price * product.quantity
    })*/
    let total = 0
    let temp = getters.cartProducts
    for( let i=0; i < temp.length; i++ ){
      total = total + (temp[i].price * temp[i].quantity)
    }
    return total
  }
}

export default {
  namespaced: true,
  state,
  actions,
  mutations,
  getters
}
