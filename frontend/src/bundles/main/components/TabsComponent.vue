<template>
  <div>
    <div>
      <h1>Settings</h1>
      <div class="toolbar">
        <router-link
          v-for="item in items"
          :key="item.title"
          :to="{
            name: item.name,
          }"
          class="toolbar-item"
        >
          {{ item.title }}
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
/* import SettingsUserDetailsPage from '@/bundles/main/pages/SettingsUserDetailsPage';
import SettingsPhotosPage from '@/bundles/main/pages/SettingsPhotosPage';
import SettingsChangePasswordPage from '@/bundles/main/pages/SettingsChangePasswordPage'; */
export default {
  components: {
    /* SettingsUserDetailsPage,
      SettingsPhotosPage,
      SettingsChangePasswordPage, */
  },
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
@import "@/assets/scss/override.scss";
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

.toolbar-item {
  margin: 20px;
}
</style>
