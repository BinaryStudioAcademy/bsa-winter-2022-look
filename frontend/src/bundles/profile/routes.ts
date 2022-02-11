import { RouteConfig } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);
const AccountSettings = () => import('./pages/AccountSettings.vue').then(m => m.default);
const EditProfile = () => import('./pages/EditProfile.vue').then(m => m.default);
const ProfileView = () => import('./pages/ProfileView.vue').then(m => m.default);

export function getProfileRoutes(): RouteConfig[] {
  return [
    {
      path: 'me/:id',
      component: LayoutPage,
      children: [
        {
          path: 'settings',
          name: 'account-settings',
          component: AccountSettings,
        },
        {
          path: 'edit',
          name: 'edit-profile',
          component: EditProfile,
        },
        {
          path: 'profile',
          name: 'view-profile',
          component: ProfileView,
        },
      ],
    },
  ];
}
