require('./bootstrap');

require('./bootstrap');

window.Vue = require('vue');

import Container from './Container'
import router from './router.js'

const app = new Vue({
  el: '#app',
  router,
  template: '<Container/>',
  components: { Container }
});
