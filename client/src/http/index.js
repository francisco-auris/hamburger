import axios from 'axios'

const http = axios.create({
  baseURL: 'http://localhost',
  headers: {
    'Content-Type': 'application/json',
    'Access-Control-Allow-Origin': '*',
  }
})

export default http
