require('./bootstrap');

import Vue from 'vue'
import App from './components/App'
import store from './store'
import router from './router'
import BootstrapVue from 'bootstrap-vue'
import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.bundle'
Vue.use(BootstrapVue)
Vue.use(Toast, {
    maxToasts: 20,
    newestOnTop: false,
    position: "bottom-right",
    timeout: 3000,
    closeOnClick: true,
    pauseOnFocusLoss: false,
    pauseOnHover: false,
    draggable: false,
    draggablePercent: 0.6,
    showCloseButtonOnHover: false,
    hideProgressBar: false,
    closeButton: "button",
    icon: true
})

const app = new Vue({
    el: '#app',
    //components: {App},
    store,
    router,
    render: h => h(App)
})