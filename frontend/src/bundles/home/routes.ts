import { RouteConfig } from 'vue-router';
const HomePage = () => import('./pages/HomePage.vue').then(m => m.default);

export function getHomeRoutes(): RouteConfig[] {
  return [
    {
      path: '/',
      name: 'home',
      component: HomePage,
    },
  ];
}
