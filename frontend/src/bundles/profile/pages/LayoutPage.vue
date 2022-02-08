<template>
  <v-app>
    <v-container fluid>
      <v-navigation-drawer>
        <v-avatar color="primary" size="56">
          <img
            alt="Avatar"
            src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
          />
        </v-avatar>
        <v-toolbar-title>John Dohe</v-toolbar-title>
        <v-select :items="items" label="Outlined style" outlined />
      </v-navigation-drawer>
    </v-container>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      items: ['foo', 'bar', 'baz', 'bad'],
    };
  },
};
</script>
