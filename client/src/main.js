// main.js
import { createApp } from 'vue'
import { createStore } from 'vuex'
import App from './App.vue'
import post from './vuex/post'

const store = createStore({
  modules: {
    post
  }
})

const app = createApp(App)
app.use(store)
app.mount('#app')
