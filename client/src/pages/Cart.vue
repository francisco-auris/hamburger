<template>
<div id="tela">
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
    </v-row>
    <v-row v-else>
      <v-col>
        <img src="@/assets/emptycart.png" width="100%">
      </v-col>
    </v-row>

  </v-container>
  <div class="box-event">
    <center>
        <p>
            <h1><sup>Total R$</sup> {{ total }}</h1>
        </p>
        <v-btn rounded color="#34495E" large dark>Finalizar pedido</v-btn>
    </center>
  </div>
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
<style scoped>
.box-event {
    width: 100%;
    height: 200px;
    background: linear-gradient(to top, transparent, #2ECC71 90%);
    color: white;
    border-radius: 15px 15px 0px 0px;
    padding: 15px;
    position:static;
    bottom:50px;
}
p { margin-bottom: 20px;}
sup {
    font-size: 12px;
}
h1 {
    font-size: 3em;
}
@media (min-height: 900px ) {
    .box-event {
        position: absolute;
    }
}
</style>
