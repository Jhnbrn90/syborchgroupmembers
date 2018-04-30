<template>
<div>
<div class="flex py-4 mt-8 pt-4 justify-center items-center border-t border-grey-light shadow-md">
            <div class="inline-flex bg-blue w-2 h-2 rounded full mr-2 shadow"></div>
            <div class="mr-4 text-sm">
                <button @click="openModal" class="text-grey-dark hover:cursor-pointer hover:underline">SFC-MS</button>
            </div>

            <div class="inline-flex bg-green w-2 h-2 rounded full mr-2 shadow"></div>
            <div class="mr-4 text-sm">NMR 300</div>

            <div class="inline-flex bg-red w-2 h-2 rounded full mr-2 shadow"></div>
            <div class="mr-4 text-sm">NMR 500</div>

            <div class="inline-flex bg-orange w-2 h-2 rounded full mr-2 shadow"></div>
            <div class="mr-4 text-sm">NMR 600</div>
</div>

<div id="SFC-modal" class="flex justify-center items-center mt-4" style="display:none;">
    <div class="p-4 w-auto h-auto shadow-md rounded text-center">
        <h4 class="text-grey-dark font-medium tracking-wide text-lg mb-2">SFC-MS</h4>
        <span class="mb-2">Used by <span class="font-medium">John</span></span>
        <div class="flex-inline mb-4 mt-2">
            <span class="mr-2">Current status:</span>
            <select class="shadow" name="status">
                <option value="running">Running</option>
                <option value="available">Available</option>
                <option value="maintenance">Maintenance</option>
            </select>
        </div>
        <button class="text-blue-dark bg-white border border-blue rounded py-px px-4 hover:bg-blue-dark hover:text-white hover:shadow">Save</button>
    </div>
</div>

</div>
</template>

<script>
export default {
  data() {
    return {
      SFC: true
    };
  },

  methods: {
    openModal() {
      document.querySelector("#SFC-modal").style.display = "flex";
    }
  }
};
</script>

