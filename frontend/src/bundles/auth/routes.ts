import { RouteConfig } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);

export function getAuthRoutes(): RouteConfig[] {
  return [
    {
      path: 'auth',
      component: LayoutPage,
    },
  ];
}
