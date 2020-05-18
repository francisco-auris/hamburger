import http from 'http'

export default class ApiProduct {
  getAll () {
    return http.get('http://localhost:8000/api/produto')
  }
}
