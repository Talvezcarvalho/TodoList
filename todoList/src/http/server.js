import axios from 'axios'

const server = axios.create({
  baseURL: 'http://localhost:8000/api/',
  timeout: 1000,
})

export default server
