<template>
  <v-card class="navbar">
    <v-navigation-drawer
      absolute
      permanent
      left
    >
      <template>
        <v-list-item class="user-info-block">
          <v-list-item-avatar
            size=61
          >
            <img src="https://randomuser.me/api/portraits/women/81.jpg">
          </v-list-item-avatar>
          <v-list-item-content>Ruben Septimus</v-list-item-content>
        </v-list-item>
      </template>

      <v-divider />

      <v-list dense>
        <v-list-item
          v-for="item in items"
          :key="item.title"
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { title: 'Home', icon: 'mdi-home-city' },
        { title: 'My Account', icon: 'mdi-account' },
        { title: 'Users', icon: 'mdi-account-group-outline' },
      ],
    };
  },
};
</script>

<style>
  .navbar {
    position: absolute;
    width: 381px;
    height: 1143px;
    left: 0;
    top: 0;
    background: #F5F5F5;
  }

  .user-info-block {
    position: absolute;
    width: 291px;
    height: 100px;
    left: 45px;
    top: 83px;
    background: #FFEBF5;
    border-radius: 7px;
  }
</style>
