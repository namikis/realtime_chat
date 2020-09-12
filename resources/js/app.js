require('./bootstrap');

window.Vue = require('vue');

Vue.component('chat', require('./chat/Chat.vue').default);

const app = new Vue({
    el: '#app'
});