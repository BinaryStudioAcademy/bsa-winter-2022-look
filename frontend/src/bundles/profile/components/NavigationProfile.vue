<template>
  <v-navigation-drawer
    app
  >
    <router-link to="/">
      <v-icon large>$logo</v-icon>
    </router-link>
    <v-sheet class="pa-4">
      <router-link :to="{name: 'details-profile'}">
        <v-avatar color="primary" size="56">
          <img
            alt="Avatar"
            src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
          />
        </v-avatar>
      </router-link>
      <v-toolbar-title>John Dohe</v-toolbar-title>
      <v-divider />
      <v-select :items="items" background-color="#FFEBF5" />
    </v-sheet>

    <v-divider />

    <v-list dense nav>
      <v-list-item v-for="menu in menus" :key="menu.title" link :to="{name: menu.link}">
        <v-list-item-icon>
          <v-icon>{{'$' + menu.icon}}</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ menu.title }}</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>

</template>

<script>
export default {
  data: () => ({
    items: ['Sign Out', 'Profile'],
    menus: [
      { title: 'List', icon: 'fire', link: 'account-settings' },
      { title: 'Your match', icon: 'heart', link: 'account-settings' },
      { title: 'Map', icon: 'badged', link: 'account-settings' },
      { title: 'Message', icon: 'minichat', link: 'account-settings' },
      { title: 'Settings', icon: 'paper', link: 'account-settings' },
    ],
  }),
};
</script>
