<template>
<div>
    <div class="flex justify-center mb-2">
        <button @click="select('syborch', 'group')" :class="isSelected('syborch', 'group') ? 'active' : 'inactive'" class="text-xs select-button blue mr-2">
            SyBOrCh
        </button>
        <button @click="select('grossmann', 'group')" :class="isSelected('grossmann', 'group') ? 'active' : 'inactive'" class="text-xs select-button blue">
            Grossmann
        </button>
    </div>

    <div class="flex justify-center mb-2">
        <button @click="select('Students', 'members')" :class="isSelected('Students', 'members') ? 'active' : 'inactive'" class="text-xs select-button indigo mr-2">
            Students
        </button>
        <button @click="select('Staff', 'members')" :class="isSelected('Staff', 'members') ? 'active' : 'inactive'" class="text-xs select-button indigo mr-2">
            Staff
        </button>
        <button @click="select('All', 'members')" :class="isSelected('All', 'members') ? 'active' : 'inactive'" class="text-xs select-button indigo">
            All members
        </button>
    </div>

    <div class="flex justify-center mb-2">
        <button @click="select('Current', 'time')" :class="isSelected('Current', 'time') ? 'active' : 'inactive'" class="text-xs select-button grey mr-2">
            Current
        </button>
        <button @click="select('All', 'time')" :class="isSelected('All', 'time') ? 'active' : 'inactive'" class="text-xs select-button grey">
            All-time
        </button>
    </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      selectors: {
        group: "syborch",
        members: "Students",
        time: "Current"
      }
    };
  },

  methods: {
    select(input, selector) {
      this.selectors[selector] = input;
    },

    isSelected(input, selector) {
      return this.selectors[selector] == input;
    }
  }
};
</script>


