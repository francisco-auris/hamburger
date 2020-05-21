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
            <div v-if="items.length > 0">
            <v-badge
              color="#FF6060"
              :content="items.length"
            >
              <center><v-icon>shopping_cart</v-icon></center>
            </v-badge>
            </div>
            <div v-else>
              <center><v-icon>shopping_cart</v-icon></center>
            </div>
            <!--<center><v-icon>shopping_cart</v-icon></center>-->
        </router-link>
      </v-btn>

      <v-btn>
        <router-link :to="{ name: 'Perfil' }" class="link">
            <center><v-icon>person</v-icon></center>
        </router-link>
      </v-btn>

    </v-bottom-navigation>
</div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
    computed: {
      ...mapGetters('cart', {
        items: 'getItems'
      })
    },
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
