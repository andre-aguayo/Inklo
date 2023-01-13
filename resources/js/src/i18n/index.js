import { createI18n } from 'vue-i18n'

const i18n = createI18n({
  locale: 'br',
  messages: {
    br: {
      AppTitle: 'Inklo',
      home: {
        title: 'Lista de usuários',
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
        storeUser: {
          success: 'Usuário salvo com sucesso.',
          error: 'Erro ao salvar o usuário.'
        },
        input: { search: 'Buscar por nome' }
      }
    },
  },
});

export default i18n;