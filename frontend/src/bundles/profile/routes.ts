import { RouteConfig } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);
const AccountSettings = () => import('./components/AccountSettings.vue');
const Profile = () => import('./pages/Profile.vue');
export function getProfileRoutes(): RouteConfig[] {
  return [
    {
      path: 'profile/:id',
      component: LayoutPage,
      children: [
        {
          path: 'account',
          component: AccountSettings,
        },
        {
          path: 'details',
          component: Profile,
        },
      ],
    },
  ];
}
