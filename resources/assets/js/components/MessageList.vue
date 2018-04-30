<template>
<div>
  <div class="flex justify-center py-4" v-if="auth">
    <add-message @new-message="addMessage"></add-message>
  </div>

  <div class="flex justify-center py-4 mt-2" v-else>
    <p class="text-grey">
      <button @click="login" class="font-medium text-blue-light no-underline hover:text-grey-dark tracking-wide">Log in</button> to leave a message.
    </p>
  </div>

  <div class="flex mt-2 justify-center">
    <div class="w-full text-center">
      <div class="bg-white h-auto py-4 max-w-lg mx-auto px-8">
        <p class="font-thin mb-6">
          <span class="text-xl tracking-wide font-medium leading-normal text-blue-dark">
            Friday 24 April
          </span>
          <br>
          <span class="text-grey">Messages</span>
          <span class="font-semibold text-blue-dark">({{ messageCount }})</span>
        </p>

        <div class="message bg-white shadow-md border-t border-grey-lightest rounded py-4" v-for="message in messages">
          <div class="flex px-4 justify-center">
            <p class="font-normal text-lg mr-2 text-blue-dark">{{ message.user.firstname }}</p>
          </div>
            <p class="font-thin text-xs text-grey-dark mb-2">({{ message.created_at | ago }})</p>
            <p class="text-black font-normal">{{ message.body }}</p>
        </div>

      </div>
    </div>
  </div>
</div>


</template>

<script>
import moment from "moment";
import AddMessage from "./AddMessage.vue";

export default {
  props: ["data", "auth"],

  components: { AddMessage },

  data() {
    return {
      messages: this.data,
      messageCount: this.data.length
    };
  },

  created() {
    window.Echo.channel("messages").listen("NewMessage", e => {
      this.messages.unshift(e.message);
      this.messageCount += 1;
    });
  },

  methods: {
    login() {
      document.querySelector("#login-modal").style.display = "flex";
    },

    addMessage(message) {
      this.messages.unshift(message);
      this.messageCount += 1;
    },

    refreshMessages() {
      axios.get("/messages").then(({ data }) => (this.messages = data));
    }
  },

  filters: {
    ago(date) {
      return moment(date).fromNow();
    }
  }
};
</script>

