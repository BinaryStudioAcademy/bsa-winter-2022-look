<template>
  <v-row justify="space-around">
    <v-menu>
      <template #activator="{ attrs, on }">
        <div class="dropdown-menu" v-bind="attrs" v-on="on">
          <v-list-item-title> Ruben Septimus </v-list-item-title>
          <v-icon size="12">
            {{ "$arrow" }}
          </v-icon>
        </div>
      </template>
      <v-list>
        <v-list-item v-for="(item, id) in items" :key="id">
          <router-link :to="{ name: item.link }" class="">
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </router-link>
        </v-list-item>
      </v-list>
    </v-menu>
  </v-row>
</template>
<script>
export default {
  data: () => ({
    items: [
      {
        title: 'Profile',
        link: 'edit-profile',
      },
      { title: 'Settings', link: 'account-settings' },
      { title: 'Logout', link: 'logout' },
    ],
  }),
};
</script>
<style lang="scss" scoped>
.dropdown-menu {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.v-list-item__title {
  align-self: center;
  font-size: 1rem;
  margin-right: 6px;
}
</style>
