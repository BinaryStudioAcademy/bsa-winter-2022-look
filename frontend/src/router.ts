import { createRouter, createWebHistory } from 'vue-router';
import { getAuthRoutes } from './bundles/auth/routes';
import LayoutPage from '@/bundles/common/pages/LayoutPage.vue';

const router = createRouter({
  history: createWebHistory(),
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
