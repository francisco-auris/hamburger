<template>
  <div id="app">
    <menu-topo v-if="online" />
    <router-view/>

    <menu-bottom v-if="online" />
  </div>
</template>

<script>
import Topo from './components/Topo';
import NavBottom from './components/Navbottom';
import { mapState } from 'vuex'

export default {
  components: {
    'menu-topo': Topo,
    'menu-bottom': NavBottom
  },
  name: 'App',
  computed: {
    online() { return Boolean(this.$store.state.user.token) }
  }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

#app {
  margin-top: 60px;
  margin-bottom: 50px;
  font-family: 'Roboto', sans-serif;
}
#bottom-navigator {
  position: fixed;
  bottom: 0;
  z-index: 99999;
}
</style>
