import { createApp } from 'vue'
import App from './App.vue'
import '@/css/app.css';

const app = createApp()
app.component('App', App);
app.mount('#app');
