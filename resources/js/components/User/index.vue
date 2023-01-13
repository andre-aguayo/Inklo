<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="card p-4 mt-5">
        <div class=" image d-flex flex-column justify-content-center align-items-center ">
          <img :src="user.avatar_url" :alt="$t('home.userCard.imgAlt')" class="rounded-circle" height="150"
            width="150" />
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h5 class="mt-3">{{ user.name }}</h5>
          <span class="name">{{ user.login }}</span>
          <span class="name">{{ user.location }}</span>

          <div class="card text-center mt-2">
            <div class="card-body">
              <p class="card-text">{{ user.bio }}</p>
            </div>
          </div>

          <!-- Repos links -->
          <div class="flex-row justify-content-center align-items-center gap-2 mb-1 mt-5">
            <h5 class="card-text">{{ $t('user.repo') }}</h5>
            <a v-for="repo in repos" :href="repo.html_url" target="_blank">
              <span class="btn btn-light me-2 mb-2">{{ repo.description || repo.name }}</span></a>
          </div>
          <div class=" d-flex mt-2">
            <button class="btn btn-primary" @click="storeUser">{{ $t('user.localStorage') }}</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { usersStore } from '../../src/services/user.service';
import { localStoreUser } from '../../src/services/api/api.service';

export default {
  data() {
    return {
      repos: {},
      user: {},
    }
  },
  async mounted() {
    const response = await usersStore().getUser(this.$route.params.user);

    this.repos = response.repos.data;
    this.user = response.user.data
  },
  methods: {
    async storeUser() {
      const response = await localStoreUser(this.$route.params.user);

      if (response.data.success) {
        this.$toast.info(this.$t(`user.storeUser.success`));
      } else {
        this.$toast.error(this.$t(`user.storeUser.error`));
      }

      setTimeout(this.$toast.clear, 3000);
    }
  },
}
</script>
<style scoped>
.row {
  margin: 0 !important;
}

.p-4 {
  max-width: 60%;
}
</style>