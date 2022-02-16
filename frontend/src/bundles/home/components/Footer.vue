<template>
  <v-footer
    padless
  >
    <v-card
      color="purpleFooter"
      flat
      tile
      width="100%"
      class="footer pa-md-11 pa-6 text-center"
    >
      <v-card-text
        class="footer--text white--text"
      >
        &copy; {{ new Date().getFullYear() }} Look
      </v-card-text>
    </v-card>
  </v-footer>
</template>

<style
  lang="scss"
  scoped
>
.footer--text {
  font-weight: bold;
}
</style>
