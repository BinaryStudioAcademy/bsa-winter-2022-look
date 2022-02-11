import { RouteConfig } from 'vue-router';
const Navbar = () => import('./components/NavbarComponent.vue').then(m => m.default);

export function getMainNavbarRoutes(): RouteConfig[] {
  return [
    {
      path: '/page',
      name: 'navbar',
      component: Navbar,
    },
  ];
}
