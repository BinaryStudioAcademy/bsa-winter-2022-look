import { RouteConfig } from 'vue-router';
const LayoutPage = () => import('./pages/LayoutPage.vue').then(m => m.default);
const RegisterLayoutPage = () => import('./pages/RegisterLayoutPage.vue').then(m => m.default);
const RegisterSetUpPage = () => import('./pages/RegisterSetUpPage.vue').then(m => m.default);
const RegisterAdditionalInfoPage = () => import('./pages/RegisterAdditionalInfoPage.vue').then(m => m.default);
const RegisterMediaPage = () => import('./pages/RegisterMediaPage.vue').then(m => m.default);
const LoginPage = () => import('./pages/LoginPage.vue').then(m => m.default);
const ResetPasswordPage = () => import('./pages/ResetPasswordPage.vue').then(m => m.default);
const ChangeEmailPasswordPage = () => import('./pages/ChangeEmailPasswordPage.vue').then(m => m.default);
const ChangePasswordPage = () => import('./pages/ChangePasswordPage.vue').then(m => m.default);
const EmailConfirmPage = () => import('./pages/EmailConfirmPage.vue').then(m => m.default);

export function getAuthRoutes(): RouteConfig[] {
  return [
    {
      path: 'auth',
      component: LayoutPage,
      redirect: {
        name: 'auth-login',
      },
      children: [
        {
          path: 'sign-in',
          name: 'auth-login',
          component: LoginPage,
        },
        {
          path: 'reset-password',
          name: 'auth-reset_password',
          component: ResetPasswordPage,
        },
        {
          path: 'change-password/:token',
          name: 'auth-change_password',
          props: true,
          component: ChangePasswordPage,
        },
        {
          path: 'email-confirm/:token',
          name: 'auth-email_confirm',
          props: true,
          component: EmailConfirmPage,
        },
        {
          path: 'change-email-password',
          name: 'auth-change_email_password',
          component: ChangeEmailPasswordPage,
        },
        {
          path: 'register',
          component: RegisterLayoutPage,
          children: [
            {
              path: '',
              name: 'auth-registration-set_up',
              component: RegisterSetUpPage,
            },
            {
              path: 'additional-info',
              name: 'auth-registration-additional_info',
              component: RegisterAdditionalInfoPage,
            },
            {
              path: 'media',
              name: 'auth-registration-media',
              component: RegisterMediaPage,
            },
          ],
        },
      ],
    },
  ];
}
