<template>
<div>
  <btn-back />
  <v-container>

        <v-row justify-sm="center">

            <v-col cols="12">
                <center><img src="../assets/icon.png" width="160"></center>
            </v-col>
            <v-col cols="12">
                <form @submit="handleSubmit($event)" >
                    <h1 align="center">Cadastro</h1>
                    <input type="text" class="form-input" placeholder="Seu nome" v-model="user.name">
                    <span class="red" v-if="errors.name">{{ errors.name }}</span>
                    <br>
                    <input type="text" class="form-input" placeholder="Seu email" v-model="user.email">
                    <span class="red" v-if="errors.email">{{ errors.email }}</span>
                    <br>
                    <input type="password" class="form-input" placeholder="Sua senha" v-model="user.password">

                    <center>
                        <v-btn type="submit" rounded class="btn" large>
                          <span v-if="!load">Registrar-se</span>
                          <span v-else>
                            <v-progress-circular
                              indeterminate
                              color="primary"
                            ></v-progress-circular>
                          </span>
                        </v-btn>
                        <br>
                        <br>

                        <br>
                        <br>
                        <br>
                        <br>
                    </center>
                </form>
            </v-col>

        </v-row>
    </v-container>
    <v-snackbar
      v-model="snackbar"
      :timeout="timeout"
    >
      {{ message }}
      <v-btn
        color="blue"
        text
        @click="snackbar = false"
      >
        <v-icon>close</v-icon>
      </v-btn>
    </v-snackbar>
</div>
</template>
<script>
import { http } from '@/api/http'
import Theback from '../components/Theback'

export default {
  components: {
    'btn-back': Theback
  },
  data () {
    return {
      user: {
        name: '', email: '', password: ''
      },
      load: Boolean,
      errors: {},
      message: '',
      snackbar: false,
      text: 'Seu login foi cadastrado com sucesso.',
      timeout: 4000,
    }
  },
  mounted() {
    this.load = false
  },
  methods: {
    loadOff() {
      this.load = false
      console.log('desligando load', this.load)
    },
    handleSubmit(e){
      e.preventDefault();
      this.load = true
      if( this.user.name == '' || this.user.email == '' || this.user.password == '' ){
        this.snackbar = true
        this.message = "Verifique o preenchimento de todos os campos"
      }
      else {

        this.message = ''
        //send dados for backend
        http.post('api/users', this.user)
          .then(res => {
            //alert('Usuario cadastrado com sucesso');
            this.loadOff();
            this.snackbar = true
            this.$router.push( {name: 'Login'} );
          })
          .catch(err => {
            this.loadOff();
            this.errors = err.data.message
          })
      }

      this.loadOff();

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
.red { color: red; font-size: 0.8em; margin-left: 10px; }
</style>
