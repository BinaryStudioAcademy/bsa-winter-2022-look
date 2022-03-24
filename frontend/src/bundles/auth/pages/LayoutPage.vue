<template>
  <v-container
    fill-height
    fluid
  >
    <v-row
      align-content="center"
      justify="space-between"
    >
      <v-col
        cols="12"
        md="6"
        class="text-center fill-height--centred"
      >
        <p class="pt-md-15">Welcome</p>
        <h1
          class="h1 purple--text font-weight-bold mb-8"
        >
          It is never too late<br>
          to fall in love
        </h1>
        <p class="font-weight-bold">To continue. Log in to Love</p>
        <v-img
          max-height="492"
          max-width="492"
          width="100%"
          contain
          class="image--auth_dog mx-auto hidden-sm-and-down"
          src="@/assets/image/auth_image.svg"
        />
      </v-col>
      <v-col
        cols="12"
        md="6"
        class="greyBg fill-height--centred"
      >
        <div class="form--auth mx-auto my-auto mt-xs-10">
          <router-link
            :to="{ name: 'home' }"
          >
            <v-img
              class="mx-auto mx-md-0 my-5 my-md-0"
              max-height="38"
              max-width="78"
              src="@/assets/image/main_logo.svg"
            />
          </router-link>
          <router-view />
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>

<style
  lang="scss"
  scoped
>
.fill-height--centred {
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  @media screen and (max-width: 959px) {
    height: auto;
  }
}

.form--auth {
  max-width: 320px;
  width: 100%;
}
p {
  font-size: 18px;
}
.image--auth_dog {
  @media screen and (max-width: 959px) {
    max-width: 250px !important;
  }
}
</style>
