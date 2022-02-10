import Router from 'vue-router';
import { getAuthRoutes } from './bundles/auth/routes';
import LayoutPage from '@/bundles/common/pages/LayoutPage.vue';
import ProfilePage from '@/bundles/common/pages/ProfilePage.vue';
import Vue from 'vue';
import { getNavbarRoutes } from '@/bundles/main/routes';

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
    {
      component: ProfilePage,
      path: '/profile',
      children: [
        ...getNavbarRoutes(),
      ],
    },
  ],
});

export default router;
