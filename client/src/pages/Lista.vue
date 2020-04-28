<template>
<div>
    <btn-back />

    <v-container class="grey lighten-5">
    <v-row class="mb-6">
        <v-col cols="12" sm="12">
            <input type="text" :disabled="!lista.length" class="search" @input="filtro = $event.target.value" placeholder="Digite para buscar" />
        </v-col>
    </v-row>
    <v-row class="mb-6" v-if="!lista.length">
        <v-col cols="12" sm="4" >
            <v-sheet class="px-3 pt-3 pb-3" >
                <v-skeleton-loader
                class="mx-auto"
                max-width="auto"
                type="list-item-avatar-three-line"
                ></v-skeleton-loader>

                <v-skeleton-loader
                class="mx-auto"
                max-width="auto"
                type="list-item-avatar-three-line"
                ></v-skeleton-loader>
            </v-sheet>
        </v-col>
    </v-row>
    <v-row
      class="mb-6" v-else
    >
      <v-col cols="12" sm="4" v-for="produto in filtroProdutos" :key="produto.id">
        <v-card
          class="pa-2"
          tile
        >
            <router-link :to="{ name: 'Detail', params: { id: produto.id } }" class="link">
                <card-produto elevation="4" :title="produto.title" :image="produto.image" :preco="produto.preco" />
            </router-link>
        </v-card>

      </v-col>
    </v-row>

  </v-container>
</div>
</template>
<script>
import CardProduto from '@/components/Produto'
import Theback from '@/components/Theback'

export default {

  components: {
    'card-produto': CardProduto,
    'btn-back': Theback
  },

  data () {
    return {
      message: '',
      lista: {},
      filtro: ''
    }
  },

  computed: {
    filtroProdutos () {
      if (this.filtro) {
        let regex = new RegExp(this.filtro.trim(), 'i')
        return this.lista.filter(p => regex.test(p.title))
      } else {
        return this.lista
      }
    }
  },

  created () {
    this.$http.get('api/produto')
      .then(res => res.json(), err => console.log(err))
      .then(produtos => this.lista = produtos)
  }
}
</script>
<style scoped>
.pa-2 {
    margin-bottom: 10px;
    border-radius: 10px;
    height: 150px;
}
.search {
    width: 100%;
    height: 40px;
    border-radius: 10px;
    padding-left: 10px;
    background-color: #eee;
    margin-top: -20px;
    outline: none;
}
.search:focus {
    border:solid 1px #FF6060;
    background-color: white;
}
.link {
    color: #2a2a2a;
}
</style>
