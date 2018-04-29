<template>
<div>
  <button @click="login" class="no-underline text-xs sm:text-base text-grey tracking-wide font-thin hover:text-blue mr-4">Login</button>
  <button class="no-underline text-xs sm:text-base text-grey tracking-wide font-thin hover:text-blue">Register</button>
</div>
</template>

<script>
export default {
  methods: {
    login() {
      document.querySelector("#login-modal").style.display = "flex";
    }
  }
};
</script>

