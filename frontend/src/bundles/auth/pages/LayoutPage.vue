<template>
  <div>
    <h1>Auth Layout</h1>
    <router-link
      :to="{ name: 'auth-login' }"
    >
      Log In
    </router-link>

    Don’t have an account?
    <router-link
      :to="{ name: 'auth-registration-set_up' }"
    >
      Sing Up
    </router-link>
    <router-view />
  </div>
</template>
