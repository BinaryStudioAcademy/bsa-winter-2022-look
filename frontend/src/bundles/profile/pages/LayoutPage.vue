<template>
  <v-app>
    <v-container fluid>
      <v-navigation-drawer>
        <v-avatar color="primary" size="56">
          <img
            alt="Avatar"
            src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
          />
        </v-avatar>
        <v-toolbar-title>John Dohe</v-toolbar-title>
        <v-select :items="items" label="Outlined style" outlined />
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

            <v-list-item-content>
              <v-list-item-title>{{ menu.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
    </v-container>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      items: ['foo', 'bar', 'baz', 'bad'],
      menus: [
        { title: 'Profile', icon: 'mdi-account' }, { title: 'Acount', icon: 'mdi-account' }],
    };
  },
};
</script>
