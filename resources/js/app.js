import './bootstrap';
import '../sass/app.scss';
import Router from '@/router';

import { createApp } from 'vue';
import { createPinia } from 'pinia';
import i18n from './src/i18n';
import Toaster from '@meforma/vue-toaster';
import { LoadingPlugin } from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/css/index.css';

const pinia = createPinia()
const app = createApp({});

app.use(Router);
app.use(pinia);
app.use(LoadingPlugin);
app.use(Toaster, { position: 'top-right' });

app.use(i18n).mount('#app');