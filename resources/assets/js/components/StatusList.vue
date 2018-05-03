<template>
<div>

  <div class="flex py-4 px-6 sm:px-0 sm:mt-8 mt-6 pt-4 justify-center items-center border-t border-grey-light shadow-md">
    <div v-for="machine in Object.keys(machines)">

        <div :class="indicatorClass(machine)" class="inline-flex w-2 h-2 rounded full mr-px shadow"></div>
        <div class="inline-flex sm:mr-4 mr-2 sm:text-sm text-xs">
            <div v-if="auth">
              <button @click="toggleModal(machine)" class="text-grey-dark hover:cursor-pointer hover:underline">
                {{ lookup[machine] }}
              </button>
            </div>
            <div v-else>
              {{ lookup[machine] }}
            </div>
        </div>

    </div>
  </div>

<div v-for="machine in Object.keys(machines)">
<div :id="machine" class="flex justify-center items-center mt-4 hidden">
    <div class="p-4 w-full h-auto shadow-md text-center border border-grey">
      <form @submit.prevent="onSubmit" action="/status">
        <h4 class="text-blue-dark underline font-medium sm:text-lg text-base mb-2">{{ machine }}</h4>
        <span class="mb-2">Updated by <span class="font-medium">{{ machines[machine]['user'] }} ({{ machines[machine]['time'] }})</span></span>
        <div class="flex-inline mb-4 mt-2">
            <span class="mr-2">Current status:</span>
            <select class="shadow" name="status" v-model="form.status">
                <option value="" disabled>-- select --</option>
                <option value="available" :selected="machines[machine]['status'] == 'available'">Available</option>
                <option value="running" :selected="machines[machine]['status'] == 'running'">Now Running</option>
                <option value="maintenance" :selected="machines[machine]['status'] == 'maintenance'">Maintenance</option>
                <option value="out-of-order" :selected="machines[machine]['status'] == 'out-of-order'">Out of order</option>
            </select>
        </div>
        <input type="hidden" name="machine" :value="machine">
        <button class="text-blue-dark bg-white border border-blue rounded py-px px-4 hover:bg-blue-dark hover:text-white hover:shadow">Update</button>
        </form>
    </div>
</div>
</div>

</div>
</template>

<script>
export default {
  props: ["auth", "data"],

  data() {
    return {
      form: {
        status: "",
        machine: ""
      },

      machines: this.data,

      lookup: {
        "SFC-MS": "SFC-MS",
        "GC-MS": "GC-MS",
        NMR300: "NMR 300",
        NMR500: "NMR 500",
        NMR600: "NMR 600",
        available: "bg-green",
        running: "bg-blue",
        maintenance: "bg-orange",
        "out-of-order": "bg-red"
      },

      modalOpen: {
        "SFC-MS": false,
        "GC-MS": false,
        NMR300: false,
        NMR500: false,
        NMR600: false
      }
    };
  },

  created() {
    window.Echo.channel("status-updates").listen("StatusUpdated", e => {
      this.machines[Object.keys(e.status)[0]] =
        e.status[Object.keys(e.status)[0]];
    });
  },

  methods: {
    onSubmit() {
      axios
        .post("/status", {
          machine: this.form.machine,
          status: this.form.status
        })
        .then(({ data }) => {
          this.machines[this.form.machine] = data;
          document.getElementById(this.form.machine).classList.add("hidden");
          this.modalOpen[this.form.machine] = false;
        });
    },

    indicatorClass(machine) {
      return this.lookup[this.machines[machine]["status"]];
    },

    toggleModal(machine) {
      // if the modal was already open, close it
      if (this.modalOpen[machine]) {
        document.getElementById(machine).classList.add("hidden");
        this.modalOpen[machine] = false;
        this.form.machine = "";
        this.form.status = "";
      } else {
        // if the modal was not yet open
        // 1. close all other modals
        Object.entries(this.modalOpen).forEach(([key, value]) => {
          if (key !== machine) {
            this.modalOpen[machine] = false;
            document.getElementById(key).classList.add("hidden");
          }
        });

        // 2. open the modal of choice
        document.getElementById(machine).classList.remove("hidden");
        this.form.machine = machine;
        this.form.status = "";
        this.modalOpen[machine] = true;
      }
    }
  }
};
</script>

