import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);


import Home from './pages/Home';
import Detail from './pages/Detail';
import Redirect from './pages/Redirect';


let router =  new Router({
  mode: 'history',
  linkActiveClass: 'active',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
    {
      path: '/view/:code',
      name: 'Detail',
      component: Detail
    },
    {
      path: '/:code',
      name: 'Redirect',
      component: Redirect
    },
  ]
});


export default router;