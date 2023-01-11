<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header row">
            <div class="col-md-2">
              {{ $t('user.title') }}
            </div>
          </div>
          <div class="card-body" v-if="repos.length">
            <div class="card-title">
              <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="card p-4">
                  <div class=" image d-flex flex-column justify-content-center align-items-center">
                    <img :src="repos[0].owner.avatar_url" :alt="$t('home.userCard.imgAlt')" height="150" width="150" />
                    <span class="name mt-3">{{ repos[0].login }}</span>
                    <span class="idd">{{ repos[0].name }}</span>

                    <div class="d-flex flex-row justify-content-center align-items-center gap-2" v-for="repo in repos">
                      <a :href="repo.html_url" target="_blank"><span class="idd1">{{ repo.description }}</span></a>
                    </div>
                    <div class=" d-flex mt-2">
                      <button class="btn1 btn-dark" @click="storeUser">{{ $t('user.localStorage') }}</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { usersStore } from '../../src/services/user.service';
import { localStoreUser } from '../../src/services/api.service';

export default {
  data() {
    return {
      repos: {},
    }
  },
  async mounted() {
    const response = await usersStore().getUser(this.$route.params.user);
    this.repos = response.data;
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