<template>
  <v-navigation-drawer :width="381" app>
    <Logo />
    <div class="avatar-block">
      <Avatar />
      <DropDownMenu />
    </div>
    <Menu />
    <v-divider />
  </v-navigation-drawer>
</template>

<script>
import Logo from './Logo.vue';
import Avatar from './Avatar.vue';
import DropDownMenu from './DropDownMenu.vue';
import Menu from './Menu.vue';
export default {
  components: {
    Logo,
    Avatar,
    DropDownMenu,
    Menu,
  },

  methods: {},
};
</script>

<style lang="scss" scoped>
@import '~vuetify/src/components/VNavigationDrawer/_variables.scss';
$navigation-drawer-border-width: 0;

.theme--light .v-navigation-drawer {
  background-color: #f5f5f5;
  padding-top: 19px;
  padding-left: 45px;
  padding-right: 45px;
}

::v-deep .v-navigation-drawer__border {
  // display: none;
  width: 0px;
}

.avatar-block {
  position: relative;
  display: flex;
  margin-top: 26px;
  padding-top: 19px;
  padding-left: 29px;
  padding-bottom: 20px;
  background-color: #ffebf5;
}

</style>
