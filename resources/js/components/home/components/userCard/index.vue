<template>
  <div class="card">
    <img :src="user.avatar_url" class="card-img-top" :alt="$t('home.userCard.imgAlt')">
    <div class="card-body">
      <h5 class="card-title">{{ user.name }}</h5>
      <p class="card-text">{{ $t('home.userCard.createdAt') + formatDate(user.created_at) }}</p>
      <p class="card-text">{{ $t('home.userCard.publicRepos') + user.public_repos }}</p>
      <p class="card-text">{{ user.bio }}</p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'userCard',
  props: ['user'],
  methods: {
    formatDate(date) {
      return (new Date(date)).toLocaleDateString();
    }
  }
}
</script>
<style scoped>
.card {
  height: 100%;
}
</style>