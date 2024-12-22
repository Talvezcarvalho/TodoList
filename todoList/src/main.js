// FILE: main.js
import './assets/main.css'
import { createApp } from 'vue'
import { Quasar } from 'quasar'

import 'quasar/dist/quasar.css'

import '@quasar/extras/roboto-font/roboto-font.css'

import 'quasar/src/css/index.sass'

import App from './App.vue'

const myApp = createApp(App)

myApp.use(Quasar, {
  plugins: {}, // import Quasar plugins and add here
})

myApp.mount('#app')
