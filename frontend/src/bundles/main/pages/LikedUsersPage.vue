<template>
  <div>
    <page-title
      title="Match"
    />
    <div
      v-if="totalUsers"
      class="lightBlack--text text-12 pb-md-4 pb-3"
    >
      There are&nbsp;<span class="orange--text">{{ totalUsers }}</span>&nbsp;candidates
    </div>

    <div class="block-filter d-flex search-bar">
      <div
        class="d-flex"
      >
      </div>

      <v-spacer />
      <v-checkbox
        class="mt-0 pt-1"
        label="Only online"
        color="primary"
        hide-details
        @click="checkboxSwitcher"
      />
    </div>

    <div class="users">
      <v-row
        justify="space-around"
      >
        <v-col
          v-for="(user, index) in users"
          :key="index"
          cols="12"
          xl="2"
          lg="3"
          md="4"
          sm="6"
        >
          <v-card
            class="v-card__user"
            elevation="0"
          >
            <v-img
              :src="user.avatar"
              height="255"
              class="grey darken-4"
            >
              <v-app-bar
                flat
                color="rgba(0, 0, 0, 0)"
              >
                <v-spacer />
                <v-btn
                  v-model="user.id"
                  class="greyMain mt-4 mr-3"
                  depressed
                  fab
                  icon
                  rounded
                  small
                  @click="rateUserById(user.id, rate.dislike, index)"
                >
                  <NoLikeIcon />
                </v-btn>
              </v-app-bar>
            </v-img>

            <v-card-title class="text-h6 pa-5">
              <v-row
                justify="space-between"
                align="center"
              >
                <v-col
                  cols="9"
                >
                  <v-badge
                    :color="user.online ? 'green' : 'lightGrey'"
                    class="h6 font-weight-bold lightBlack--text"
                    dot
                    inline
                    left
                  >
                    {{ user.name }}
                  </v-badge>
                  <div
                    class="text-12 font-weight-regular border--text"
                  >
                    {{ user.distance }} km
                  </div>
                </v-col>
                <v-col
                  cols="3"
                  class="d-flex justify-end"
                >
                  <v-btn
                    class="greyMain"
                    depressed
                    fab
                    icon
                    rounded
                  >
                    <ChatIcon />
                  </v-btn>
                </v-col>
              </v-row>
            </v-card-title>
          </v-card>
        </v-col>
      </v-row>
    </div>

  </div>
</template>

<script>
import PageTitle from '@/bundles/common/components/PageTitle';
import ChatIcon from '@/bundles/main/components/icons/ChatIcon';
import NoLikeIcon from '@/bundles/main/components/icons/NoLikeIcon';
import { mapActions } from 'vuex';
import namespace from '../../auth/store/modules/auth/namespace';
import { GET_USERS_LIKED, RATE_USER } from '../../auth/store/modules/auth/types/actions';

export default {
  components: {
    PageTitle,
    ChatIcon,
    NoLikeIcon,
  },

  data() {
    return {
      users: undefined,
      totalUsers: undefined,
      onlineStatus: false,
    };
  },

  beforeMount() {
    this.getUsers();
  },

  methods: {
    ...mapActions(namespace, {
      getLikedUsers: GET_USERS_LIKED,
      rateUser: RATE_USER,
    },

    ),
    getUsers() {
      return this.getLikedUsers(this.onlineStatus)
        .then(data => {
          this.users = data.users;
          this.totalUsers = data.usersTotal;
        }).catch(error => {
          console.dir(error);
        });
    },
    rateUserById(id, rate, index) {
      return this.rateUser({
        id: id,
        status: rate,
      }).then(() => {
        this.users.splice(index, 1);
      }).catch(error => {
        console.dir(error);
      });
    },
    checkboxSwitcher() {
      this.onlineStatus = !this.onlineStatus;
      this.getUsers();
    },

  },

};
</script>
