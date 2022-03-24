import { RouteConfig } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);
const ListPage = () => import('./pages/ListPage.vue').then(m => m.default);
const MatchPage = () => import('./pages/MatchPage.vue').then(m => m.default);
const MapPage = () => import('./pages/MapPage.vue').then(m => m.default);
const ChatPage = () => import('./pages/ChatPage.vue').then(m => m.default);
const EventsPage = () => import('./pages/EventsPage.vue').then(m => m.default);
const SettingsPage = () => import('./pages/SettingsPage.vue').then(m => m.default);
const SettingsUserDetailsPage = () => import('./pages/SettingsUserDetailsPage.vue').then(m => m.default);

export function getMainRoutes(): RouteConfig[] {
  return [
    {
      component: LayoutPage,
      path: '/',
      children: [
        {
          component: ListPage,
          path: '/list',
          name: 'main-list',
        },
        {
          component: MatchPage,
          path: '/match',
          name: 'main-match',
        },
        {
          component: MapPage,
          path: '/map',
          name: 'main-map',
        },
        {
          component: ChatPage,
          path: '/chat',
          name: 'main-chat',
        },
        {
          component: EventsPage,
          path: '/events',
          name: 'main-events',
        },
        {
          component: SettingsPage,
          path: '/settings',
          name: 'main-settings',
          children: [
            {
              component: SettingsUserDetailsPage,
              path: '/user_details',
              name: 'main-settings-details',
            },
          ],
        },
      ],
    },
  ];
}
