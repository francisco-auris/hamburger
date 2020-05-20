<template>
<div>
  <btn-back />
  <v-container>

    <h3>Perfil</h3>
    <!-- inicio -->

    <!---->
  </v-container>

    <v-tabs
      v-model="tab"
      color="#FF6060"
    >
      <v-tab
        v-for="item in items"
        :key="item.tab"
      >
          {{ item.tab }}
        </v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item>
          <v-card flat>
            <perfil-datas />
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card flat>
            <perfil-address />
          </v-card>
        </v-tab-item>
      </v-tabs-items>

</div>
</template>
<script>
import Theback from '../components/Theback'
import PerfilDatas from '@/pages/tabs/Datas'
import PerfilAddress from '@/pages/tabs/Address'
export default {
  components: {
    'btn-back': Theback,
    'perfil-datas': PerfilDatas,
    'perfil-address': PerfilAddress
  },
  data () {
      return {
        tab: null,
        items: [
          { tab: 'Meus dados', content: 'Tab 1 Content' },
          { tab: 'Endereços', content: 'Tab 2 Content' },
          { tab: 'Pedidos', content: 'Tab 3 Content' },
        ],
      }
    },
}
</script>
<style scoped>
.v-card__text {
  padding: 25px !important;
}
.v-tabs-bar {
  padding-left: 35px !important;
}
</style>
