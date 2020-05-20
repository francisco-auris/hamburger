<template>
  <v-container>
    <v-row>
      <v-col cols="12">Nome: {{ dados.name }}</v-col>
    </v-row>
    <v-row>
      <v-col cols="12">E-mail: {{ dados.email }}</v-col>
    </v-row>
  </v-container>
</template>
<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('user', {dados: 'user'})
  }
}
</script>>
