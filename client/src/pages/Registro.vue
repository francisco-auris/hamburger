<template>
<div>
  <v-container>

        <v-row justify-sm="center">

            <v-col cols="12">
                <center><img src="../assets/icon.png" width="160"></center>
            </v-col>
            <v-col cols="12">
                <form @submit="handleSubmit($event)" >
                    <h1 align="center">Cadastro</h1>
                    <input type="text" class="form-input" placeholder="Seu nome" v-model="user.name">
                    <br>
                    <input type="text" class="form-input" placeholder="Seu email" v-model="user.email">
                    <br>
                    <input type="password" class="form-input" placeholder="Sua senha" v-model="user.password">

                    <center>
                        <v-btn type="submit" rounded class="btn" large>Registrar-se</v-btn>
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
      user: {
        name: '', email: '', password: ''
      },
      message: ''
    }
  },
  methods: {
    handleSubmit(e){
      e.preventDefault();
      if( this.user.name == '' || this.user.email == '' || this.user.password == '' ){
        this.message = "Verifique o preenchimento de todos os campos"
      }
      else {
        this.message = ''
        //send dados for backend
        http.post('api/users', this.user)
          .then(res => {
            alert('Usuario cadastrado com sucesso');
            this.$router.push( {name: 'Login'} );
          })
          .catch(err => this.message = err.data)
      }
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
