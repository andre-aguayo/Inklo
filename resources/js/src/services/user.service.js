import { getUserInformationFromGit, getUserReposFromGit } from './api.service';
import { defineStore } from 'pinia';

const usersLogin = ['wallysonn', 'diego3g', 'filipedeschamps', 'rmanguinho'];

export const usersFromGit = async () => {
  let users = [];

  for (let user of usersLogin) {
    users.push(await getUserInformationFromGit(user));
  }

  return users;
};

export const usersStore = await defineStore('users', {
  state: async () => ({
    users: null,
    user: null,
  }),
  getters: {
    async users() {
      return await this.getUsers();
    },
    async user() {
      return await this.getUser();
    }
  },
  actions: {
    async getUsers() {
      return await usersFromGit();
    },
    async getUser(login) {
      return await getUserReposFromGit(login);
    }
  }
});
