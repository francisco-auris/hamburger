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
              <card-produto elevation="4" :chave="produto.id" :title="produto.title" :image="produto.image" :price="produto.price" />
        </v-card>

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
    }
  },
  computed: {
    ...mapGetters('cart', {
      teste: 'cartProducts'
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
