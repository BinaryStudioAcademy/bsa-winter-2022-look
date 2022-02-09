<template>
  <div>
    <h1>Auth Layout</h1>
    <router-link to="/auth">
      Log In
    </router-link>

    Don’t have an account?
    <router-link to="/auth/register">
      Sing Up
    </router-link>
    <router-view />
  </div>
</template>
