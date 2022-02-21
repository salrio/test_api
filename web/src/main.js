import './autoload'
import { createApp } from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Servers from "./config/servers.config"
axios.defaults.baseURL = Servers.VUE_API_SERVER
axios.defaults.headers.post['Content-Type'] = 'application/json';

// MainCore
import App from './App.vue'

// Global
import NavBar from "./components/_site/global/_navbar.vue"
import NavFooter from "./components/_site/global/_footer.vue"
import SideBar from "./components/_site/global/_sidebar.vue"
import FixedPlugin from "./components/_site/global/_fixedplugin.vue"

// Router / Stores
import router from './router'
import store from './store/'

// Css
import '../resources/scss/material-dashboard.scss'
import './assets/css/global.css'
// Js
import '../resources/js/core/bootstrap-material-design.min'

// plugins
import '../resources/js/plugins/arrive.min'

import '../resources/js/plugins/moment.min'
// import '../resources/js/plugins/moment.min' >> built-in does not work
// required
// npm i moment

import '../resources/js/plugins/bootstrap-datetimepicker.min'
import '../resources/js/plugins/bootstrap-notify'
import '../resources/js/plugins/bootstrap-selectpicker'

import '../resources/js/plugins/bootstrap-tagsinput'
// import '../resources/js/plugins/chartist.min' >> chartist not defined
// required
// npm i vue-chartist
// set to autoload.js

import '../resources/js/plugins/fullcalendar.min'
import '../resources/js/plugins/jasny-bootstrap.min'
import '../resources/js/plugins/jquery-jvectormap'
import '../resources/js/plugins/jquery.bootstrap-wizard'

import '../resources/js/plugins/jquery.dataTables.min'
// required
// npm i datatables.net-autofill
// npm install datatables.net-bs4 datatables.net-buttons datatables.net-responsive
// npm datatables.net-autofill-dt
// optional libraries: https://datatables.net/download/npm#NPM-package-installation

import '../resources/js/plugins/jquery.tagsinput'
import '../resources/js/plugins/jquery.validate.min'
import '../resources/js/plugins/nouislider.min'

// import '../resources/js/plugins/perfect-scrollbar.min' >> PerfectScrollbar not defined
// required
// npm i perfect-scrollbar

import '../resources/js/plugins/sweetalert2'
// dashboard
import '../resources/js/material-dashboard.min.js'

// additional libraries (if needed)
// import '../node_modules/select2/dist/js/select2.min'
// import '../node_modules/@fortawesome/fontawesome-free/js/all.min'

// error grid if this is loaded ?? hmmm
// import '../node_modules/datatables.net-select-bs/js/select.bootstrap.min'

// Mount
createApp(App)
	.use(store)
	.use(router)
	.use(VueAxios, axios)
	.component('NavBar', NavBar)
	.component('NavFooter', NavFooter)
	.component('Sidebar', SideBar)
	.component('FixedPlugin', FixedPlugin)
	.mount('#app')