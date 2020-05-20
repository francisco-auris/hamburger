<template>
<div>
   <btn-back />
  <v-container>
    <h3>Seu carrinho</h3>
    <br>
    <v-row
      class="mb-6"
       v-if="vefEmpty > 0"
    >
      <v-col cols="12" sm="4" v-for="produto in teste" :key="produto.id">
        <v-card
          class="pa-2"
          tile
        >
              <card-produto elevation="4" :chave="produto.id" :quantity="produto.quantity" :title="produto.title" :image="produto.image" :price="produto.price" />
        </v-card>

      </v-col>
      <v-col>
        <br>
        <h3>Total: R$ {{ total }}</h3><br>
        <v-btn rounded color="#2ECC71" large>Finalizar pedido <v-icon>monetization_on</v-icon></v-btn>
      </v-col>
    </v-row>
    <v-row v-else>
      <v-col>
        <img src="@/assets/emptycart.png" width="100%">
      </v-col>
    </v-row>

  </v-container>
</div>
</template>
<script>
import CardProduto from '@/components/CardCart'
import Theback from '../components/Theback'
import { mapGetters } from 'vuex'

export default {
  components: {
    'card-produto': CardProduto,
    'btn-back': Theback
  },
  data(){
    return {
      cart: [], items: []
    }
  },
  computed: {
    ...mapGetters('cart', {
      teste: 'cartProducts',
      total: 'cartTotalPrice'
    }),
    vefEmpty() {
      return this.teste.length
    }
  },
  mounted(){
    this.items = this.$store.getters['product/getAll']
    this.cart = this.$store.getters['cart/getItems']
    //console.log(this.cart, this.items)
    //console.log(this.$store)
  }
}
</script>
