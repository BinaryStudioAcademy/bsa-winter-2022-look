<template>
  <router-link :to="{name: 'view-profile'}">
    <v-avatar size="61px">
      <img
        alt="Avatar"
        src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
      />
    </v-avatar>
  </router-link>
</template>
<script>
export default {

  data: () => ({
    success: false,
  }),

};

</script>
