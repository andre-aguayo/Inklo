import { createI18n } from 'vue-i18n'

const i18n = createI18n({
  locale: 'br',
  messages: {
    br: {
      AppTitle: 'Inklo',
      users: {
        title: 'Lista de usuários',
        input: { search: 'Buscar pelo nome' },
        userCard: {
          title: 'Cartão com informaçoes do usuário',
          imgAlt: 'Avatar do usuário',
          createdAt: 'Usuário desde: ',
          publicRepos: 'Repositórios públicos: ',
        }
      },
      user: {
        title: 'Informaçoes do usuário',
        localStorage: 'Salvar',
        repo:'Repositórios:',
        storeUser: {
          success: 'Usuário salvo com sucesso.',
          error: 'Erro ao salvar o usuário.'
        },
      }
    },
  },
});

export default i18n;