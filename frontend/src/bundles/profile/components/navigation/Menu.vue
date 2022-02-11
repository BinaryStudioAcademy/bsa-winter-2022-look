<template>
  <v-list dense nav>
    <v-list-item v-for="menu in menus" :key="menu.title" link>
      <router-link :to="{name: menu.link}" class="router-link">
        <v-list-item-icon>
          <v-icon color="8E9396">{{ "$" + menu.icon }}</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>{{ menu.title }}</v-list-item-title>
        </v-list-item-content>
      </router-link>
    </v-list-item>
  </v-list>
</template>
<script>
export default {
  data: () => ({
    menus: [
      { title: 'List', icon: 'fire', link: 'account-settings' },
      { title: 'Your match', icon: 'heart', link: 'you-match' },
      { title: 'Map', icon: 'badged', link: 'account-settings' },
      { title: 'Message', icon: 'minichat', link: 'account-settings' },
    ],
  }),
};
</script>
<style lang="scss" scoped>

.v-list {
  margin-top: 53px;
}

.v-list-item a {
  display: flex;
  text-decoration: none;
  color: #8E9396;
}

</style>
