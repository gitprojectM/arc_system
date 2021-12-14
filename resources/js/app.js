

require('./bootstrap')


import {createApp} from 'vue'

import App from './App.vue'
//import Log from './Login.vue'
import axios from 'axios'
import router from './router'

const app = createApp(App)
//const Vue = Vue.createApp()
window.events = createApp();

//window.Vue = require('vue');
  
//window.events = new Vue();
  
window.flash = function(message) {
    createApp('flash', message);
}


//const log = createApp(Log)
app.component('flash', require('./components/Flash.vue'));
app.config.globalProperties.$axios = axios;
app.use(router)
app.mount('#app')
//log.mount('#log')








