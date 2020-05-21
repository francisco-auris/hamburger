<template>
<div class="box" :elevation="0">
  <button class="btn-delete" @click="removeItem"><v-icon>close</v-icon></button>
  <img :src="image">
  <div class="texto">
      <h2>{{ title }}</h2>
  </div>
  <div style="clear: both;"></div>
  <v-divider></v-divider>
  <span>R$ {{ price }}</span>

  <v-btn-toggle style="float:right"
    mandatory
  >
    <v-btn small @click="decrement">
      -
    </v-btn>
    <v-btn small>
      {{ quantity }}
    </v-btn>
    <v-btn small @click="icrement">
      +
    </v-btn>
  </v-btn-toggle>
  <br><br>
</div>
</template>
<script>
export default {
  props: ['image','title','price','chave','quantity'],
  methods: {
    removeItem() {
      this.$store.commit('cart/REMOVE_ITEM_CART', this.chave)
    },
    icrement(){
      this.$store.commit('cart/ICREMENT_PRODUCT', this.chave)
    },
    decrement(){
      this.$store.commit('cart/DECREMENT_PRODUCT', this.chave)
    }
  }
}
</script>
<style scoped>
.btn-delete {
  width: 32px;
  height: 32px;
  background-color: #FF6060;
  position: absolute;
  border-radius: 25px;
  margin-top: -15px;
  margin-left: -15px;
  box-shadow: 0px 2px 4px rgba(0,0,0,0.3);
}
  hr {
    margin-top: 15px;
    margin-bottom: 15px;
  }
  .box {
    width: 100%;
    padding: 10px;
    border-radius: 15px !important;
    box-shadow: 0px 1px 4px rgba(0,0,0,0.3);
  }
  img {
    display: inline-block;
    width: 40%;
    float: left;
}
.texto {
    width: 60%;
    display: inline-block;
    vertical-align: top;
    float: right;
    text-align: left;
    padding-left: 10px;
}
span {
    color: #FF6060;
}
</style>
