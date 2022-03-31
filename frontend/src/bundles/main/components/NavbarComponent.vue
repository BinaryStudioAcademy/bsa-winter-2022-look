<template>
  <div>
    <v-navigation-drawer
      v-model="drawer"
      class="px-5 py-2"
      color="greyMain"
      app
      overlay-color="white"
      overlay-opacity=".1"
      mobile-breakpoint="960"
    >
      <router-link
        :to="{ name: 'main-list' }"
      >
        <LogoIcon />
      </router-link>

      <v-item-group
        class="items-menu pt-5"
      >

        <v-menu
          v-if="user"
          offset-y
        >
          <template #activator="{ on, attrs }">
            <div
              v-bind="attrs"
              class="lightPink pl-2 pr-5 py-2 mb-10 rounded-lg"
              v-on="on"
            >
              <v-list-item-avatar>
                <v-img src="https://randomuser.me/api/portraits/men/78.jpg" />
              </v-list-item-avatar>
              <span class="h5 font-weight-regular mr-5">
                {{ user.name }}
              </span>
              <v-icon
                class="primary--text"
              >
                mdi-menu-down
              </v-icon>
            </div>
          </template>
          <v-list>
            <v-list-item>
              <router-link :to="{ name: 'main-settings-details'}" class="lightBlack--text">Settings</router-link>
            </v-list-item>
            <v-list-item>
              <v-btn class="lightBlack--text" @click.prevent="handleLogout">Log out</v-btn>
            </v-list-item>
          </v-list>
        </v-menu>

        <router-link
          v-for="item in menuApp"
          :key="item.title"
          :to="{
            name: item.name,
          }"
          class="list-item lightGrey--text"
        >
          <v-badge
            v-if="hasNewMessage && item.name === 'main-chat'"
            dot
            overlap
            bordered
            color="orange"
          >
            <component
              :is="item.icon"
            />
          </v-badge>
          <component
            :is="item.icon"
            v-else
          />
          <span class="space-between" />
          <v-hover
            v-slot="{ hover }"
          >
            <span
              :class="{ 'primary--text': hover }"
              class="h5 font-weight-bold"
            >
              {{ item.title }}
            </span>
          </v-hover>
        </router-link>
        <v-divider />
      </v-item-group>

      <FrequentlyChat
        :frequently-chat="frequentlyChat"
      />
    </v-navigation-drawer>
    <v-app-bar
      flat
      class="d-md-none headerMain"
    >
      <v-app-bar-nav-icon
        @click="drawer = !drawer"
      />
      <v-spacer />
      <v-menu
        v-if="user"
        bottom
        min-width="200px"
        rounded
        offset-y
      >
        <template #activator="{ on }">
          <v-btn
            icon
            x-large
            v-on="on"
          >
            <v-avatar
              size="36"
            >
              <v-img src="https://randomuser.me/api/portraits/men/78.jpg" />
            </v-avatar>
          </v-btn>
        </template>
        <v-card>
          <v-list-item-content class="justify-center">
            <div class="mx-auto text-center">
              <v-btn
                depressed
                rounded
                text
                :to="{name: 'main-settings-details'}"
              >
                Settings
              </v-btn>
              <v-divider class="my-3" />
              <v-btn
                depressed
                rounded
                text
              >
                Logout
              </v-btn>
            </div>
          </v-list-item-content>
        </v-card>
      </v-menu>
    </v-app-bar>
  </div>
</template>
<script>

import namespace from '@/bundles/auth/store/modules/auth/namespace';
import { LOGOUT_USER } from '@/bundles/auth/store/modules/auth/types/actions';
import { mapActions } from 'vuex';
import LogoIcon from '@/bundles/main/components/icons/LogoIcon';
import ArrowIcon from '@/bundles/main/components/icons/ArrowIcon';
import ListIcon from '@/bundles/main/components/icons/ListIcon';
import LikeIcon from '@/bundles/main/components/icons/LikeIcon';
import MapIcon from '@/bundles/main/components/icons/MapIcon';
import ChatIcon from '@/bundles/main/components/icons/ChatIcon';
import EventsIcon from '@/bundles/main/components/icons/EventsIcon';
import HasMassageDotIcon from '@/bundles/main/components/icons/HasMassageDotIcon';
import FrequentlyChat from '@/bundles/main/components/FrequentlyChat';

export default {
  components: {
    FrequentlyChat,
    LogoIcon,
    ArrowIcon,
    ListIcon,
    LikeIcon,
    MapIcon,
    ChatIcon,
    EventsIcon,
    HasMassageDotIcon,
  },
  props: {
    user: {
      type: Object,
      default: undefined,
    },
  },
  data() {
    return {
      drawer: null,
      messages: 1,
    };
  },
  computed: {
    menuApp() {
      return [
        { title: 'List', icon: 'ListIcon', name: 'main-list' },
        { title: 'Your match', icon: 'LikeIcon', name: 'main-match' },
        { title: 'Map', icon: 'MapIcon', name: 'main-map' },
        { title: 'Chat', icon: 'ChatIcon', name: 'main-chat' },
        { title: 'Events', icon: 'EventsIcon', name: 'main-events' },
      ];
    },
    frequentlyChat() {
      return [
        {
          image: 'https://randomuser.me/api/portraits/women/1.jpg',
          id: 1,
          name: 'Zoe Kim',
          online: true,
          message: 3,
        },
        {
          image: 'https://randomuser.me/api/portraits/women/2.jpg',
          id: 2,
          name: 'Monica Biluc',
          online: false,
          message: 1,
        },
        {
          image: 'https://randomuser.me/api/portraits/women/3.jpg',
          id: 3,
          name: 'Tatiana Carder',
          online: true,
          message: 0,
        },
      ];
    },
    hasNewMessage() {
      return true;
    },
  },
  methods: {
    ...mapActions(namespace, {
      logoutUser: LOGOUT_USER,
    }),
    handleLogout() {
      this.logoutUser()
        .then(() => this.$router.push({ name: 'home' }));
    },
  },
};
</script>

<style lang="scss">
.list-item {
  &:hover {
    svg path {
      fill: #FE5FAA;
    }
  }
}

.space-between {
  padding-right: 17px;
}

.list-item {
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: start;
  margin-bottom: 35px;
  list-style-type: none;
}

.v-navigation-drawer__border {
  background: transparent !important;
}
</style>
