<template>
  <div>
    <v-app-bar
      flat
      height="prominent"
      class="menu-header headerMain"
    >
      <v-container>
        <v-row
          align="center"
        >
          <v-toolbar-title>
            <router-link to="/">
              <v-img
                class="ml-2 mr-md-16"
                src="@/assets/image/main_logo.svg"
              />
            </router-link>
          </v-toolbar-title>
          <v-toolbar-items class="hidden-md-and-down">
            <v-btn
              v-for="(item, index) in menuItems"
              :key="index"
              depressed
              :to="item.url"
              :ripple="false"
              class="menu-header--nav text-capitalize font-weight-bold mr-3"
            >
              {{ item.title }}
            </v-btn>
          </v-toolbar-items>
          <v-spacer
            class="hidden-lg-and-up"
          />

          <v-row
            v-if="isAuthorized && !!userInfo.name"
            justify="end"
          >
            <router-link
              :to="{ name: 'auth-login' }"
              class="to-user hidden-md-and-down"
            >
              <v-list-item>
                <v-list-item-avatar>
                  <v-img src="https://randomuser.me/api/portraits/men/78.jpg" />
                </v-list-item-avatar>

                <v-list-item-content>
                  <v-list-item-title>{{userInfo.name}}</v-list-item-title>
                </v-list-item-content>

              </v-list-item>
            </router-link>
          </v-row>

          <v-row
            v-else
            class="d-lg-flex hidden-md-and-down"
            justify="end"
          >
            <v-btn
              class="text-capitalize font-weight-bold mr-3"
              color="primary"
              large
              raised
              rounded
              plain
              depressed
              max-width="162"
              width="100%"
              :ripple="false"
              :to="{ name: 'auth-login' }"
            >
              Log in
            </v-btn>
            <v-btn
              class="text-capitalize font-weight-bold mr-3"
              color="primary"
              large
              raised
              rounded
              outlined
              depressed
              max-width="162"
              width="100%"
              :to="{ name: 'auth-registration-set_up' }"
            >
              Sign up
            </v-btn>
          </v-row>
          <v-app-bar-nav-icon
            class="hidden-lg-and-up"
            @click.stop="toggleMenu"
          />

        </v-row>
      </v-container>
    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
    >
      <v-btn
        v-for="(item, index) in menuItems"
        :key="index"
        block
        depressed
        :to="item.url"
        :ripple="false"
        class="menu-header--nav text-capitalize font-weight-bold mr-3"
      >
        {{ item.title }}
      </v-btn>

      <v-spacer />
      <router-link
        v-if="isAuthorized && !!userInfo.name"
        :to="{ name: 'auth-login' }"
        class="to-user"
      >
        <v-list-item>
          <v-list-item-avatar>
            <v-img src="https://randomuser.me/api/portraits/men/78.jpg" />
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>{{userInfo.name}}</v-list-item-title>
          </v-list-item-content>

        </v-list-item>
      </router-link>
      <div v-else>
        <v-btn
          class="text-capitalize font-weight-bold"
          color="primary"
          large
          raised
          rounded
          plain
          depressed
          width="100%"
          :ripple="false"
          :to="{ name: 'auth-login' }"
        >
          Log in
        </v-btn>
        <v-btn
          class="text-capitalize font-weight-bold"
          color="primary"
          large
          raised
          rounded
          plain
          depressed
          width="100%"
          :to="{ name: 'auth-registration-set_up' }"
        >
          Sign up
        </v-btn>
      </div>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  props: {
    menuItems: {
      type: Array,
      required: true,
    },
    isAuthorized: {
      type: Boolean,
      default: false,
    },
    userInfo: {
      type: Object,
      default: undefined,
    },
  },
  data: () => ({
    drawer: false,
  }),
  methods: {
    toggleMenu() {
      this.drawer = !this.drawer;
    },
  },
};
</script>

<style
  lang="scss"
  scoped
>
.to-user {
  text-decoration: none;
}
.menu-header--nav.v-btn {
  &:hover::before {
    opacity: 0;
  }
}
.to-user .v-list-item__title {
  font-family: 'Lato', sans-serif;
  font-size: 18px !important;
}
</style>
