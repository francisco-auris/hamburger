<template>
<div>
    <v-bottom-navigation
      id="bottom-navigator"
      scroll-threshold="500"
      absolute
      color="#FF6060"
      horizontal
    >
      <v-btn>
        <router-link :to="{ name: 'Home' }" class="link">
            <center><v-icon>home</v-icon></center>
        </router-link>
      </v-btn>
      <v-btn >
        <router-link :to="{ name: 'Lista' }" class="link">
            <center><v-icon>restaurant_menu</v-icon></center>
        </router-link>
      </v-btn>

      <v-btn>
        <router-link :to="{ name: 'Cart' }" class="link">
            <center><v-icon>shopping_cart</v-icon></center>
        </router-link>
      </v-btn>
    </v-bottom-navigation>
</div>
</template>
<script>
export default {
    methods: {

    }
}
</script>
<style scoped>
.link {
    color: #AAA;
    text-decoration: none;
}
.router-link-exact-active {
    color: #FF6060;
}
</style>
