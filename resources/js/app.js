import {createApp} from 'vue'

require('./bootstrap')
import App from './App.vue'
//import Log from './Login.vue'
import axios from 'axios'
import router from './router'
const app = createApp(App)
//const log = createApp(Log)
app.config.globalProperties.$axios = axios;
app.use(router)
app.mount('#app')
//log.mount('#log')








