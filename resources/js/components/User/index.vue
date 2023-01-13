<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="card p-4 mt-5">
        <div class=" image d-flex flex-column justify-content-center align-items-center ">
          <img :src="user.avatar_url" :alt="$t('home.userCard.imgAlt')" class="rounded-circle" height="150"
            width="150" />
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h5 class="mb-2">{{ user.name }}</h5>
          <span class="name mt-3">{{ user.login }}</span>

          <!-- Repos links -->
          <div class="flex-row justify-content-center align-items-center gap-2 mb-1">
            <a v-for="repo in repos" :href="repo.html_url" target="_blank">
              <span class="btn btn-light me-2 mb-2">{{ repo.description || repo.name }}</span></a>
          </div>
          <div class=" d-flex mt-2">
            <button class="btn btn-primary" @click="storeUser">{{ $t('user.localStorage') }}</button>
          </div>
        </div>
      </div>
    </div>

    <div ref="container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div class="toast fade opacity-75 bg-danger" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-delay="15000">
        <div class="toast-header bg-danger">
          <strong class="me-auto text-white">Error</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-white error-body">dcsadasda</div>
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
      user: {}
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
        return alert('Usuário salvo com sucesso.');
      }

      return alert($t('Erro ao salvar o usuário localmente.'));
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