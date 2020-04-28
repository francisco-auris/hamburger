export default class AuthServices {
  constructor (user) {
    this.user = user
  }

  login () {
    console.log('Teste de login: ', this.user)
  }

  register () {}

  logout () {

  }
}
