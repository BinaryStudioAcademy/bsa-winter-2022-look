import { RouteConfig } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);
const ListPage = () => import('./pages/ListPage.vue').then(m => m.default);
const MatchPage = () => import('./pages/MatchPage.vue').then(m => m.default);
const MapPage = () => import('./pages/MapPage.vue').then(m => m.default);
const ChatPage = () => import('./pages/ChatPage.vue').then(m => m.default);
const EventsPage = () => import('./pages/EventsPage.vue').then(m => m.default);

export function getMainRoutes(): RouteConfig[] {
  return [
    {
      component: LayoutPage,
      path: '/',
      children: [
        {
          path: '/list',
          name: 'main-list',
          component: ListPage,
        },
        {
          path: '/match',
          name: 'main-match',
          component: MatchPage,
        },
        {
          path: '/map',
          name: 'main-map',
          component: MapPage,
        },
        {
          path: '/chat',
          name: 'main-chat',
          component: ChatPage,
        },
        {
          path: '/events',
          name: 'main-events',
          component: EventsPage,
        },
      ],
    },
  ];
}
