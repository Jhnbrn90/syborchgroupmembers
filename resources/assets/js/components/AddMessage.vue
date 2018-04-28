<template>
    <form method="POST" action="/messages" class="w-1/2 text-center inline-flex mt-2">
        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mr-2" placeholder="Send a message...">
        <button type="submit" class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded">
            Send
        </button>
    </form>
</template>

<script>
export default {
  data() {
    return {
      data: ""
    };
  }
};
</script>

