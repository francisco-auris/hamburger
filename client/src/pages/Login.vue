<template>
<div>
    <v-container>

        <v-row justify-sm="center">

            <v-col cols="12">
                <center><img src="../assets/icon.png" width="160"></center>
            </v-col>
            <v-col cols="12">
                <form @submit="handleSubmit($event)" >
                    <input type="text" class="form-input" placeholder="Seu email" v-model="user.email">
                    <br>
                    <input type="password" class="form-input" placeholder="Sua senha" v-model="user.password">

                    <center>
                        <v-btn type="submit" rounded class="btn" large>Entrar</v-btn>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <a href="#">Clique aqui para se <span>Registrar</span></a>
                    </center>
                </form>
            </v-col>

        </v-row>
    </v-container>
</div>
</template>
<script>
import http from '@/http'
export default {
  data () {
    return {
      user: {}
    }
  },
  methods: {
    handleSubmit: function (e) {
      e.preventDefault()
      // Auth
      //this.$store.dispatch('actionLogin', this.user);
      //console.log(this.$store.state.user.token);
      http.post('api/login', this.user)
        .then(res => console.log(res))
        .catch(err => console.log(err))


      /*http.get('https://api.coindesk.com/v1/bpi/currentprice.json')
      .then(response => (this.info = response.data.bpi))
      .catch(error => console.log(error))*/
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
