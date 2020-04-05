import Vue from 'vue';
import Router from 'vue-router';
import IndexPage from '../pages/IndexPage';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: IndexPage,
    },
  ],
});
