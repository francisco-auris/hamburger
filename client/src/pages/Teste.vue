<template>
  <div>
    {{ dados }}
    <v-btn color="#F0F" @click="teste()">teste()</v-btn>
  </div>
</template>
<script>
import { http } from '@/api/http'

export default {
  data () {
    return {
      dados: {
        payment: 'dinheiro',
        total: 0,
        address_id: 1,
        user_id: 1,
        line: [
          {
            name: 'Mega cheddar',
            valor: 5,
            quantity: '1'
          }
        ]
      }
    }
  },
  methods: {
    teste() {
      http.post('api/order', this.dados)
        .then(res => console.log(res))
        .catch(err => console.log(err))
    }
  }
}
</script>
