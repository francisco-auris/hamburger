<template>
<div>
    <v-container>

        <v-row justify-sm="center" justify="center">

            <v-col cols="12" lg="6">
                <center><img src="../assets/icon.png" width="160"></center>
            </v-col>

        </v-row>
        <v-row justify-sm="center" justify="center">
            <v-col cols="12" lg="6">
                <form @submit="handleSubmit($event)" >
                    <input type="text" class="form-input" placeholder="Seu email" v-model="user.email">
                    <br>
                    <input type="password" class="form-input" placeholder="Sua senha" v-model="user.password">

                    <center>
                        <v-btn type="submit" rounded class="btn" large>Entrar</v-btn>
                        <br>
                        <br>
                        <v-alert
                          dense
                          color="#FF6060"
                          :dismissible="true"
                          v-if="message.length > 0"
                        >
                          {{ message }}
                        </v-alert>
                        <br>
                        <br>
                        <br>
                        <br>
                        <router-link :to="{ name: 'Register' }">Clique aqui para se <span>Registrar</span></router-link>
                    </center>
                </form>
            </v-col>

        </v-row>

    </v-container>
</div>
</template>
<script>
import { http } from '@/api/http'

export default {
  data () {
    return {
      user: {},
      message: ''
    }
  },
  methods: {
    handleSubmit: function (e) {
      e.preventDefault()
      // Auth
      this.$store.dispatch('user/actionLogin', this.user)
      .then(res => {
        console.log('Deu certo')
        this.$router.push( {name: 'Lista'} );
      })
      .catch(err => {
        if( err.status == 401 ){
          this.message = "Usuário ou Senha inválido"
        }else {
          this.message = err.data.error
        }
      })
      //this.actionLogin(this.user);
    }
  }
}
</script>
<style scoped>
.form-input {
    width: 100%;
    height: 50px;
    background-color: #eee;
    border-radius: 25px;
    padding-left: 20px;
    margin-top: 20px;
    outline: none;
}
    .form-input:focus {
        border:solid 1px #FF6060;
        background-color: white;
    }
.btn {
    background-color: #FF6060 !important;
    color: white;
    padding-left: 15px;
    padding-right: 15px;
    margin-top: 20px;
}
a {
    color: #aaa;
    text-decoration: none;
}
a span {
    color: #FF6060;
    text-decoration: underline;
}
</style>
