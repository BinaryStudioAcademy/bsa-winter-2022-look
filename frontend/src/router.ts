import Router from 'vue-router';
import { getAuthRoutes } from './bundles/auth/routes';
import { getHomeRoutes } from './bundles/home/routes';
import { getMainRoutes } from '@/bundles/main/routes';
import LayoutPage from '@/bundles/common/pages/LayoutPage.vue';
import Vue from 'vue';

Vue.use(Router);

const REDIRECT_TO = 'main-list';

const router = new Router({
  mode: 'history',
  routes: [
    {
      component: LayoutPage,
      path: '/',
      children: [
        ...getAuthRoutes(),
        ...getHomeRoutes(),
        ...getMainRoutes(),
      ],
    },
    {
      path: '*',
      redirect: { name: REDIRECT_TO },
    },
  ],
});

export default router;
