<template>
  <div>
    <h2 class="h4 primary--text head-login mt-md-16 mb-2 text-center text-md-left">
      Sign Up
    </h2>
    <p class="small-text font-weight-light mb-6 text-center text-md-left">
      Already have an account?
      <router-link
        class="link orange--text font-weight-regular"
        :to="{ name: 'auth-login' }"
      >
        Log In
      </router-link>
    </p>
    <router-view />
  </div>
</template>

<style
  lang="scss"
>
@import "@/assets/scss/override.scss";
</style>
