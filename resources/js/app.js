import { createApp } from 'vue'
import './bootstrap'
import App from '../js/App.vue'
import router from '../js/router/Index.js'

const app = createApp(App)

app.use(router).mount('#app')
