<template>
  <v-container>
    <card-endereco />
    <card-endereco />
    <card-endereco />
  </v-container>
</template>
<script>
import CardAddress from '@/components/CardAddress'
export default {
  components: {
    'card-endereco': CardAddress
  }
}
</script>
