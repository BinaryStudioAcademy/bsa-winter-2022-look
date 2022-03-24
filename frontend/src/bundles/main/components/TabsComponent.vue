<template>
  <div>
    <div>
      <h1 class="ml-4 mt-3">Settings</h1>
      <div class="toolbar mt-2 mb-2">
        <router-link
          v-for="item in items"
          :key="item.title"
          :to="{
            name: item.name,
          }"
          class="toolbar-item ma-3 mt-xs-3 mb-xs-3"
        >
          <h3>{{ item.title }}</h3>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  computed: {
    items() {
      return [
        { title: 'User details', name: 'main-settings-details' },
        { title: 'Photos', name: 'main-settings-photos' },
        { title: 'Change password', name: 'main-settings-change-password' },
      ];
    },
  },
};
</script>

<style lang="scss" scoped >

.theme--light.v-sheet--outlined {
  border: none;
}

.v-tabs-slider {
  background-color: white !important;
}

.toolbar {
  display: flex;
  justify-content: start;
  align-items: center;
}

</style>
