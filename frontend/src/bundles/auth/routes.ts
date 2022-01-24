import { RouteRecordRaw } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);

export function getAuthRoutes(): Array<RouteRecordRaw> {
  return [
    {
      path: 'auth',
      component: LayoutPage,
    },
  ];
}
