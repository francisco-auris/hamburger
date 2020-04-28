<template>
  <div id="app">
    <menu-topo />
    <router-view/>

    <menu-bottom />
  </div>
</template>

<script>
import Topo from './components/Topo';
import NavBottom from './components/Navbottom';

export default {
  components: {
    'menu-topo': Topo,
    'menu-bottom': NavBottom
  },
  name: 'App'
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
