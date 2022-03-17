<template>
  <v-container class="container" fluid>
    <TabsComponent />
    <div>
      <span>User photo</span>
      <v-avatar
        class="user-avatar"
        size=61
        right
      >
        <img src="https://randomuser.me/api/portraits/women/81.jpg">
      </v-avatar>
    </div>
  </v-container>
</template>
<style scoped lang="scss">
  .container {
    margin: 37px 45px 53px 45px;
  }

  .nav {
    display: flex;
    align-items: center;
    justify-content: start;
  }

  .nav-item {
    margin-right: 30px;
  }
</style>
<script>
import TabsComponent from '@/bundles/main/components/TabsComponent';

export default {
  components: {
    TabsComponent,
  },
};
</script>
