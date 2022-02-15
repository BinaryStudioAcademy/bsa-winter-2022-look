import { RouteConfig } from 'vue-router';
const List = () => import('./pages/ListPage.vue').then(m => m.default);
const Match = () => import('./pages/MatchPage.vue').then(m => m.default);
const Map = () => import('./pages/MapPage.vue').then(m => m.default);
const Message = () => import('./pages/MessagePage.vue').then(m => m.default);

export function getMainNavbarRoutes(): RouteConfig[] {
  return [
    {
      path: '/list',
      name: 'list',
      component: List,
    },
    {
      path: '/match',
      name: 'match',
      component: Match,
    },
    {
      path: '/map',
      name: 'map',
      component: Map,
    },
    {
      path: '/message',
      name: 'message',
      component: Message,
    },
  ];
}
