import { RouteConfig } from 'vue-router';
const Navbar = () => import('./components/NavbarComponent.vue').then(m => m.default);

export function getNavbarRoutes(): RouteConfig[] {
  return [
    {
      path: '/page',
      component: Navbar,
    },
  ];
}
