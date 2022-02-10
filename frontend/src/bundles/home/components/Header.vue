<template>
  <div>
    <v-app-bar
      flat
      height="prominent"
      class="menu-header"
    >
      <v-container>
        <v-row
          align="center"
        >
          <v-toolbar-title>
            <router-link to="/">
              <v-img
                class="mr-md-16"
                src="@/assets/image/main_logo.svg"
              />
            </router-link>
          </v-toolbar-title>
          <v-toolbar-items class="hidden-md-and-down">
            <v-btn
              v-for="(item, index) in items"
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
            v-if="!isAuthorized"
            class="d-lg-flex hidden-md-and-down"
            justify="end"
          >
            <v-btn
              class="text-capitalize font-weight-bold mr-3"
              color="button-main"
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
              color="button-main"
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

          <v-row
            v-else
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
                  <v-list-item-title>John Leider</v-list-item-title>
                </v-list-item-content>

              </v-list-item>
            </router-link>
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
        v-for="(item, index) in items"
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
      <div v-if="!isAuthorized">
        <v-btn
          class="text-capitalize font-weight-bold"
          color="button-main"
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
          color="button-main"
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
      <router-link
        v-else
        :to="{ name: 'auth-login' }"
        class="to-user"
      >
        <v-list-item>
          <v-list-item-avatar>
            <v-img src="https://randomuser.me/api/portraits/men/78.jpg" />
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>John Leider</v-list-item-title>
          </v-list-item-content>

        </v-list-item>
      </router-link>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  props: {
    items: {
      type: Array,
      required: true,
    },
    isAuthorized: {
      type: Boolean,
      default: false,
    },
  },
  data: () => ({
    drawer: false,
    group: null,
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
@import "@/assets/styles/variables.scss";
@import "@/assets/styles/override.scss";

.to-user {
  text-decoration: none;
}
.to-user .v-list-item__title {
  font-family: 'Lato', sans-serif;
  font-size: 18px;
}
</style>
