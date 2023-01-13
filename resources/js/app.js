import './bootstrap';
import '../sass/app.scss';
import Router from '@/router';

import { createApp } from 'vue';
import { createPinia } from 'pinia';
import i18n from './src/i18n';

const pinia = createPinia()
const app = createApp({});

app.use(Router);
app.use(pinia);

app.use(i18n).mount('#app');