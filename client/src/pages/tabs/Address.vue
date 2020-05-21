<template>
  <v-container>

    <v-expansion-panels flat>
      <v-expansion-panel>
        <v-expansion-panel-header>Novo endereço</v-expansion-panel-header>
        <v-expansion-panel-content>
          <form>
            <v-row>
              <v-col cols="12" sm="6">
                <v-text-field
                  v-model="address.endereco"
                  :counter="200"
                  label="Endereço"
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6">
                <v-text-field
                  v-model="address.cep"
                  :counter="9"
                  label="CEP"
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="12">
                <v-text-field
                  v-model="address.obs"
                  :counter="200"
                  label="Ponto de referência"
                  required
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-btn color="#FF6060" dark @click="handleSubmit($event)">Salvar</v-btn>
              </v-col>
            </v-row>
          </form>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </v-expansion-panels>

    <div v-for="t in dados" :key="t.id">
      <card-endereco :endereco="t.endereco" :cep="t.cep" :obs="t.obs" />
    </div>
  </v-container>
</template>
<script>
import CardAddress from '@/components/CardAddress'
import { mapGetters } from 'vuex'

export default {
  components: {
    'card-endereco': CardAddress
  },
  data(){
    return {
      address: {
        user_id: this.$store.state.user.user.id,
        endereco: '',
        cep: '',
        obs: ''
      }
    }
  },
  created(){
    this.$store.dispatch('address/pushAllAddress')
  },
  computed: {
    ...mapGetters('address', {
      dados: 'getAll'
    })
  },
  methods: {
    handleSubmit(event) {
      event.preventDefault();
      console.log(this.address)
      this.$store.dispatch('address/actionCreate', this.address)
        .then(res => console.log(res))
        .catch(err => console.log('error', err))
    }
  }
}
</script>
