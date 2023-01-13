<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card mt-5">

          <div class="card-header row">
            <div class="col-md-9">
              {{ $t('users.title') }}
            </div>
            <div class="col-md-3">
              <div class="input-group rounded">
                <input type="search" class="form-control rounded" :placeholder="$t('users.searchPlaceholder')"
                  :aria-label="$t('users.searchPlaceholder')" aria-describedby="search-addon" v-model="searchParam"
                  @input="search" />
                <span class="input-group-text border-0" id="search-addon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                  </svg>
                </span>
              </div>
            </div>
          </div>

          <div class="card-body row" v-if="visibleUsers">
            <div class="col-3" v-for="user in visibleUsers">
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
      visibleUsers: [],
      searchParam: '',
    }
  },
  components: {
    userCard
  },
  async created() {
    this.visibleUsers = this.users = await usersStore().users;

  },
  methods: {
    search() {
      let visibleUsers = [];

      this.users.forEach((user) => {
        if (user.data.name.match(new RegExp(this.searchParam, 'gi')))
          visibleUsers.push(user);
      });

      if (visibleUsers.length)
        this.visibleUsers = visibleUsers;
      else if (this.searchParam)
        this.visibleUsers = this.users;
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