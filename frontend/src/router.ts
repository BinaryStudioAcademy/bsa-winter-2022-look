import Router from 'vue-router';
import { getAuthRoutes } from './bundles/auth/routes';
import LayoutPage from '@/bundles/common/pages/LayoutPage.vue';
import Vue from 'vue';
import { getProfileRoutes } from './bundles/profile/routes';

Vue.use(Router);

const router = new Router({
  mode: 'history',
  routes: [
    {
      component: LayoutPage,
      path: '/',
      children: [
        ...getAuthRoutes(),
        ...getProfileRoutes(),
      ],
    },
  ],
});

export default router;
