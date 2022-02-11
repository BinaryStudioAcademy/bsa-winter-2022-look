<template>
  <v-card class="navbar-container">
    <v-layout>
      <v-navigation-drawer
        position="left"
        width="381"
        height="1143px"
      >
        <v-item class="logo">
          <IconLogo />
        </v-item>
        <template>
          <v-list-item
            avatar="https://randomuser.me/api/portraits/women/81.jpg"
            title="Jane Smith"
          />
        </template>
        <v-list class="user-info-block" density="compact" nav>
          <v-list-item prepend-icon="mdi-home-city" title="List" value="list" />
          <v-list-item prepend-icon="mdi-account" title="Your match" value="your-match" />
          <v-list-item prepend-icon="mdi-account-group-outline" title="Map" value="map" />
          <v-list-item prepend-icon="mdi-account-group-outline" title="Message" value="message" />
        </v-list>
      </v-navigation-drawer>
      <v-main />
    </v-layout>
  </v-card>
</template>

<script>

import IconLogo from '@/bundles/main/components/icons/IconLogo';
export default {
  name: 'Logo',
  components: { IconLogo },
  data() {
    return {
      items: [
        { title: 'List', icon: 'mdi-home-city' },
        { title: 'Your match', icon: 'mdi-account' },
        { title: 'Map', icon: 'mdi-account-group-outline' },
        { title: 'Message', icon: 'mdi-account-group-outline' },
      ],
    };
  },
};
</script>

<style>
  ::v-deep .logo {
    position: absolute;
    left: 2.24%;
    right: 93.7%;
    top: 1.82%;
    bottom: 94.53%;
  }
  ::v-deep .navbar-container {
    position: absolute;
    width: 381px;
    height: 1143px;
    left: 0;
    top: 0;
    background: #F5F5F5;
  }

  ::v-deep .user-info-block {
    position: absolute;
    width: 291px;
    height: 100px;
    left: 45px;
    top: 83px;
    background: #FFEBF5;
    border-radius: 7px;
  }
</style>
