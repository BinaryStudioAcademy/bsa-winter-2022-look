<template>
  <v-app>
    <v-navigation-drawer
      app
    >
      <router-link to="/">
        <h1>Logo</h1>
      </router-link>
      <v-avatar color="primary" size="56">
        <img
          alt="Avatar"
          src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
        />
      </v-avatar>
      <v-toolbar-title>John Dohe</v-toolbar-title>
      <v-divider />
      <v-select :items="items" />
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-h6"> Profile </v-list-item-title>
          <v-list-item-subtitle> This is profile page </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider />

      <v-list dense nav>
        <v-list-item v-for="menu in menus" :key="menu.title" link>
          <v-list-item-icon>
            <v-icon>{{ menu.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content @click="handleShow(menu.title)">
            <v-list-item-title>{{ menu.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-main>
      <v-container>
        <v-row>
          <v-col>
            <AccountSettings v-if="showAcc" />
            <Profile v-if="showProfile" />
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import AccountSettings from '../components/AccountSettings.vue';
import Profile from './Profile.vue';
export default {
  components: {
    AccountSettings,
    Profile,
  },
  data() {
    return {
      showAcc: false,
      showProfile: true,
      items: ['Sign Out', 'Profile'],
      menus: [
        { title: 'Profile', icon: 'mdi-account' }, { title: 'Account', icon: 'mdi-account' }],
    };
  },

  methods: {
    handleShow(type) {
      switch (type) {
      case 'Profile':
        this.showProfile = true;
        this.showAcc = false;
        break;
      case 'Account':
        this.showAcc = true;
        this.showProfile = false;
        break;
      }
    },
  },
};
</script>
