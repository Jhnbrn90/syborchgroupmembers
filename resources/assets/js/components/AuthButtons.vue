<template>
<div>
  <button @click="login" class="no-underline text-xs sm:text-base text-grey tracking-wide font-thin hover:text-blue mr-4">Login</button>
  <button @click="register" class="no-underline text-xs sm:text-base text-grey tracking-wide font-thin hover:text-blue">Register</button>
</div>
</template>

<script>
export default {
  data() {
    return {
      loginOpen: false,
      registerOpen: false
    };
  },

  methods: {
    login() {
      if (this.loginOpen) {
        this.closeLogin();
      } else {
        this.openLogin();
      }
    },

    register() {
      if (this.registerOpen) {
        this.closeRegister();
      } else {
        this.openRegister();
      }
    },

    openLogin() {
      this.loginOpen = true;
      this.closeRegister();
      document.querySelector("#login-modal").style.display = "flex";
    },

    closeLogin() {
      this.loginOpen = false;
      document.querySelector("#login-modal").style.display = "none";
    },

    openRegister() {
      this.registerOpen = true;
      this.closeLogin();
      document.querySelector("#register-modal").style.display = "flex";
    },

    closeRegister() {
      this.registerOpen = false;
      document.querySelector("#register-modal").style.display = "none";
    }
  }
};
</script>

