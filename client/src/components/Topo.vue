<template>
    <!--<div class="topo">
        NOME DO USUARIO
    </div>-->
    <div>
        <v-app-bar
        fixed
        color="deep-purple accent-4"
        :light="true"
        :elevation="0"
        :flat="true"
        class="bg-white"
        >
            <v-avatar color="#FF6060" size="32" style="margin-right:15px">
              <v-icon dark>person</v-icon>
            </v-avatar>

            <v-spacer>
                <span class="font-weight-black">{{ user.name }}</span>
            </v-spacer>

            <v-btn text small color="error" @click="logout"><v-icon>exit_to_app</v-icon></v-btn>

        </v-app-bar>
    </div>
</template>
<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState('user', ['token','user'])
  },
  methods: {
    logout(){
      this.$store.commit('user/USER_LOGOUT')
      this.$router.push({name: 'Login'})
    }
  }
}
</script>>
<style scoped>
.topo {
    width: 100%;
    height: 60px;
    position: fixed;
    top: 0;
    background-color: white;
    line-height: 60px;
    padding-left: 20px;
    font-weight: bold;
    z-index: 999;
}
.bg-white {
    background-color: white !important;
    padding-left: 5px;
}
.font-weight-black {
    font-weight: bold;
}
</style>
