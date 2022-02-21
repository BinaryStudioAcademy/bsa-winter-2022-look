import Router from 'vue-router';
import { getAuthRoutes } from './bundles/auth/routes';
import { getHomeRoutes } from './bundles/home/routes';
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
        ...getHomeRoutes(),
      ],
    },
  ],
});

export default router;
