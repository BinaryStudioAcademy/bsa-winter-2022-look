import Router from 'vue-router';
import { getAuthRoutes } from './bundles/auth/routes';
import LayoutPage from '@/bundles/common/pages/LayoutPage.vue';
import Vue from 'vue';

Vue.use(Router);

const router = new Router({
  mode: 'history',
  routes: [
    {
      component: LayoutPage,
      path: '/',
      children: [
        ...getAuthRoutes(),
      ],
    },
  ],
});

export default router;
