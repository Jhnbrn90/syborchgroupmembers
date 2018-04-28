<template>
<div>
    <div class="message" v-for="message in messages">
        <div class="flex px-4 justify-center">
            <p class="font-normal text-lg inline-flex mr-2 text-blue-dark">{{ message.user.name }}</p>
                <p class="font-thin text-sm text-grey-dark">({{ message.created_at | ago }})</p>
        </div>
        <p class="text-grey-dark">{{ message.body }}</p>
    </div>
</div>
</template>

<script>
import moment from "moment";

export default {
  props: ["messages"],

  filters: {
    ago(date) {
      return moment(date).fromNow();
    }
  }
};
</script>

