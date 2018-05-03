/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("add-message", require("./components/AddMessage.vue"));
Vue.component("message-list", require("./components/MessageList.vue"));
Vue.component("auth-buttons", require("./components/AuthButtons.vue"));
Vue.component("status-list", require("./components/StatusList.vue"));

import VueClipboard from "vue-clipboard2";
Vue.use(VueClipboard);
Vue.component("student-selector", require("./components/StudentSelector.vue"));

const app = new Vue({
  el: "#app"
});
