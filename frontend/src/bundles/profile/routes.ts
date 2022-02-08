import { RouteConfig } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);
const AccountSettings = () => import('./pages/AccountSettings.vue').then(m => m.default);
const Profile = () => import('./pages/Profile.vue');
export function getProfileRoutes(): RouteConfig[] {
  return [
    {
      path: 'profile/:id',
      component: LayoutPage,
      children: [
        {
          path: 'account',
          name: 'account-settings',
          component: AccountSettings,
        },
        {
          path: 'details',
          name: 'details-profile',
          component: Profile,
        },
      ],
    },
  ];
}
