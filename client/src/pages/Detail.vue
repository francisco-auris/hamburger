<template>
<div>

    <btn-back />
    <v-container>
        <v-row justify="center" >
            <v-col cols="12" sm="6">
                <v-sheet class="px-3 pt-3 pb-3" elevation="4" v-if="!produto.image">
                    <v-skeleton-loader
                    class="mx-auto"
                    max-width="auto"
                    type="image"
                    ></v-skeleton-loader>
                </v-sheet>
                <cover :img="produto.image" v-else />
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="12" sm="6">
                <center>
                    <h2>{{ produto.title }}</h2>
                    <br>
                    <v-sheet class="px-3 pt-3 pb-3" elevation="4" v-if="!produto.ingredientes">
                        <v-skeleton-loader
                        class="mx-auto"
                        max-width="auto"
                        type="paragraph"
                        ></v-skeleton-loader>
                    </v-sheet>
                    <p class="details" v-else>
                        {{ produto.ingredientes }}
                    </p>
                </center>
            </v-col>
        </v-row>
    </v-container>

    <div class="box-event">
        <center>
            <v-sheet class="px-3 pt-3 pb-3" elevation="4" v-if="!produto.preco">
                <v-skeleton-loader
                class="mx-auto"
                max-width="auto"
                type="chip"
                ></v-skeleton-loader>
            </v-sheet>
            <p v-else>
                <h1><sup>R$</sup> {{ produto.preco }}</h1>
            </p>
            <div class="text-center" v-if="!cart">
                <v-btn rounded color="primary" @click="addProductCart" dark large>Adicionar ao carrinho <v-icon>add_shopping_cart</v-icon></v-btn>
            </div>
            <div class="text-center" v-else>
              <div class="okay"><v-icon>done</v-icon></div>
            </div>
        </center>
    </div>

</div>
</template>
<script>
import Cover from '../components/Cover'
import Theback from '../components/Theback'
import { mapGetters } from 'vuex'

export default {

  components: {
    'cover': Cover,
    'btn-back': Theback
  },
  data () {
    return {
      produto: Array,
      cart: Boolean
    }
  },
  mounted () {
    //console.log(this.$store.getters['cart/vefProductCart'](1))
    this.produto = this.$store.getters['product/getProduct'](this.$route.params.id)
    this.cart = this.$store.getters['cart/vefProductCart'](this.$route.params.id)
    ///console.log(this.$store.getters['cart/vefProductCart'](this.$route.params.id), this.$route.params.id)
  },
  computed: {
    /*...mapGetters('cart',{
      vefShow: 'getItems'
    }),*/
  },
  methods: {
    addProductCart(){
      //console.log(this.produto.id)
      this.cart = true
      this.$store.dispatch('cart/addProductToCart', this.produto.id);
    }
  }

}
</script>
<style scoped>
.okay {
  width: 50px;
  height: 50px;
  border-radius: 50px;
  padding: 25px;
  background-color: #2ECC71;
  text-align: center;
  padding: 0px;
  line-height: 50px;
  color: white;
  box-shadow: 0px 1px 3px rgba(0,0,0,0.3);
}
.theme--light {
    background-color: transparent !important;
}
.box-event {
    width: 100%;
    height: 200px;
    background-color: #FF6060;
    color: white;
    border-radius: 15px 15px 0px 0px;
    padding: 15px;
    position:static;
    bottom:50px;
}
.details {
    text-align: left;
    border-left: solid 3px #FF6060;
    padding-left: 10px;
    padding-top: 15px;
    padding-bottom: 15px;
}
p { margin-bottom: 20px;}
sup {
    font-size: 12px;
}
h1 {
    font-size: 3em;
}
@media (min-width: 700px ) {
    .box-event {
        position: absolute;
    }
}
@media (min-height: 700px ) {
    .box-event {
        position: absolute;
    }
}
</style>
