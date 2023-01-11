<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header row">
            <div class="col-md-10">
              {{ $t('home.title') }}
            </div>
          </div>

          <div class="card-body row">
            <div class="col-3" v-for="user in users">
              <router-link class="card-link" :to="`/users/${user.data.login}`">
                <userCard :user="user.data"></userCard>
              </router-link>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { usersStore } from "../../src/services/user.service";
import userCard from "./components/userCard/index.vue";

export default {
  data() {
    return {
      users: [],
    }
  },
  components: {
    userCard
  },
  async created() {
    this.users = await usersStore().users;
  },
  methods: {
    search() {

    }
  }
}
</script>
<style scoped>
.row {
  margin-right: 0 !important;
  margin-left: 0 !important;
}

.card-link {
  color: #000;
  text-decoration: none;
}
</style>