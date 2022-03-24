<template>
  <v-container
    class="container ma-0 pl-0 pr-0"
    fluid
  >
    <TabsComponent />
    <router-view />
  </v-container>
</template>
<style scoped lang="scss">

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

<style>

.container {
  max-width: 1400px;
}

</style>
