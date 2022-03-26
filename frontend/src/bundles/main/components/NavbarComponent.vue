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
            <v-list-item
              v-for="(item, index) in menuUser"
              :key="index"
            >
              <router-link
                :to="{
                  name: item.name,
                }"
                class="lightBlack--text"
              >
                {{ item.title }}
              </router-link>
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

      <v-item-group
        class="pt-5"
      >
        <v-list-item-title
          class="font-weight-medium h6 mt-3 mb-3"
        >
          Frequently chat
        </v-list-item-title>

        <v-list-item
          v-for="(item, index) in frequentlyChat"
          :key="index"
          class="d-flex pa-0"
          flat
        >
          <v-badge
            :color="item.online ? 'green' : 'lightGrey'"
            dot
            overlap
            bordered
            bottom
            class="mr-3"
          >
            <v-avatar
              size="32"
            >
              <img
                :src="item.image"
              >
            </v-avatar>
          </v-badge>

          <router-link
            class="d-block w-100"
            :to="{name: 'main-chat'}"
          >
            <v-list-item-title
              class="d-flex justify-space-between"
            >
              <span
                class="text-14 lightBlack--text"
              >
                {{ item.name }}
              </span>
              <span
                class="counter-msg primary font-weight-bold text-14 white--text"
              >
                5
              </span>
            </v-list-item-title>
          </router-link>
        </v-list-item>
      </v-item-group>
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

import LogoIcon from '@/bundles/main/components/icons/LogoIcon';
import ArrowIcon from '@/bundles/main/components/icons/ArrowIcon';
import ListIcon from '@/bundles/main/components/icons/ListIcon';
import LikeIcon from '@/bundles/main/components/icons/LikeIcon';
import MapIcon from '@/bundles/main/components/icons/MapIcon';
import ChatIcon from '@/bundles/main/components/icons/ChatIcon';
import EventsIcon from '@/bundles/main/components/icons/EventsIcon';
import HasMassageDotIcon from '@/bundles/main/components/icons/HasMassageDotIcon';

export default {
  components: {
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
    menuUser() {
      return [
        { title: 'Settings', name: 'main-settings-details' },
        { title: 'Logout', name: 'logout' },
      ];
    },
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
          distance: '500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/2.jpg',
          id: 2,
          name: 'Monica Biluc',
          online: false,
          distance: '1500m',
        },
        {
          image: 'https://randomuser.me/api/portraits/women/3.jpg',
          id: 3,
          name: 'Tatiana Carder',
          online: true,
          distance: '700m',
        },
      ];
    },
    hasNewMessage() {
      return true;
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
