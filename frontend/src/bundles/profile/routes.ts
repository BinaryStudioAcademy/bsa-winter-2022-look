import { RouteConfig } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);

export function getProfileRoutes(): RouteConfig[] {
  return [
    {
      path: 'profile',
      component: LayoutPage,
    },
  ];
}
