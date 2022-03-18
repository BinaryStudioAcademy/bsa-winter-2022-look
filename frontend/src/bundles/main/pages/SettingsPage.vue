<template>
  <v-container class="container" fluid>
    <TabsComponent />
    <router-view />
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
