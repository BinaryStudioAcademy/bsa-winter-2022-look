<template>
  <div>
    <div>
      <ul class="toolbar mb-2">
        <li
          v-for="item in items"
          :key="item.title"
          class="toolbar-item ma-3 mt-xs-3 mb-xs-3"
        >
          <router-link
            :to="{
              name: item.name,
            }"
          >
            <h3>{{ item.title }}</h3>
          </router-link>
        </li>
      </ul>
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
.v-application a {
  color: #8E9396;
}
a.router-link-active {
  color: #8E9396;
}
a.router-link-exact-active {
  color: #fe5faa;
}
.theme--light.v-sheet--outlined {
  border: none;
}

.v-tabs-slider {
  background-color: white !important;
}

.toolbar {
  list-style-type: none;
  display: flex;
  justify-content: start;
  align-items: center;
}
</style>
