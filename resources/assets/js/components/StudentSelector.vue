<template>
<div>
    <div class="flex justify-center mb-4">
        <button @click="toggleFilters" class="underline hover:text-blue-dark text-grey-dark font-medium text-lg hover:cursor-pointer">{{ this.filters ? 'Hide' : 'Show' }} Filters</button>
    </div>

    <div class="pt-4 mx-auto py-px sm:w-1/3 shadow-lg border-t border-grey-light bg-white rounded-lg mb-4" v-show="filters">
        <div class="flex justify-center mb-2">
        <button @click="select('syborch', 'group')" :class="isSelected('syborch', 'group') ? 'active' : 'inactive'" class="text-base select-button blue mr-2">
            SyBOrCh
        </button>
        <button @click="select('grossmann', 'group')" :class="isSelected('grossmann', 'group') ? 'active' : 'inactive'" class="text-base select-button blue mr-2">
            Grossmann
        </button>
        <button @click="select('all', 'group')" :class="isSelected('all', 'group') ? 'active' : 'inactive'" class="text-base select-button blue">
            Both
        </button>
    </div>

    <div class="flex justify-center mb-2">
        <button @click="select('student', 'members')" :class="isSelected('student', 'members') ? 'active' : 'inactive'" class="text-base select-button indigo mr-2">
            Students
        </button>
        <button @click="select('staff', 'members')" :class="isSelected('staff', 'members') ? 'active' : 'inactive'" class="text-base select-button indigo mr-2">
            Staff
        </button>
        <button @click="select('all', 'members')" :class="isSelected('all', 'members') ? 'active' : 'inactive'" class="text-base select-button indigo">
            All members
        </button>
    </div>

    <div class="flex justify-center mb-4">
        <button @click="select('current', 'time')" :class="isSelected('current', 'time') ? 'active' : 'inactive'" class="text-base select-button grey mr-2">
            Current
        </button>
        <button @click="select('all', 'time')" :class="isSelected('all', 'time') ? 'active' : 'inactive'" class="text-base select-button grey">
            All-time
        </button>
    </div>

    </div>

    <div class="flex justify-center align-items items-center">
        <button class="px-4 py-2 rounded bg-white border border-blue-dark hover:bg-blue-dark hover:text-white"
        v-clipboard:copy="emailString"
        @click="handleCopyStatus('success')"
        >
        <span v-if="copySuccess === true">Copied!</span>
        <span v-if="copySuccess !== true">Copy e-mails ({{ this.users.length }})</span>
        </button>
    </div>

                    <div class="invisible md:visible sm:flex justify-center">
                    <table class="text-left m-4" style="border-collapse:collapse">
                        <thead>
                            <tr>
                                <th class="table-heading">
                                    Firstname
                                </th>
                                <th class="table-heading">
                                    Lastname
                                </th>
                                <th class="table-heading">
                                    E-mail
                                </th>
                                <th class="table-heading">
                                    Phone number
                                </th>
                                <th class="table-heading">
                                    Start date
                                </th>
                                <th class="table-heading">
                                    End date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-blue-lighter" v-for="user in users">
                                <td class="font-medium text-grey-darkest py-4 px-6 border-b border-grey-light">
                                    {{ user.firstname }}
                                </td>
                                <td class="font-medium text-grey-darkest py-4 px-6 border-b border-grey-light text-center">
                                    {{ user.lastname }}
                                </td>
                                <td class="font-medium text-grey-darkest py-4 px-6 border-b border-grey-light text-center">
                                    {{ user.email }}
                                </td>
                                <td class="font-medium text-grey-darkest py-4 px-6 border-b border-grey-light text-center">
                                    {{ user.phone }}
                                </td>
                                <td class="font-medium text-grey-darkest py-4 px-6 border-b border-grey-light text-center">
                                    {{ formatDate(user.start_date) }}
                                </td>
                                <td class="font-medium text-grey-darkest py-4 px-6 border-b border-grey-light text-center">
                                    {{ formatDate(user.end_date) }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
</div>
</template>

<script>
import moment from "moment";

export default {
  data() {
    return {
      filters: true,
      copySuccess: false,
      emails: [],
      emailString: "",
      users: [],

      selectors: {
        group: "syborch",
        members: "student",
        time: "current"
      }
    };
  },

  created() {
    this.getMembers();
  },

  methods: {
    toggleFilters() {
      this.filters ? (this.filters = false) : (this.filters = true);
    },

    select(input, selector) {
      this.selectors[selector] = input;
      this.getMembers();
    },

    isSelected(input, selector) {
      return this.selectors[selector] == input;
    },

    formatDate(date) {
      return moment(date).format("LL");
    },

    handleCopyStatus(status) {
      if (status == "success") {
        this.copySuccess = true;
        setTimeout(() => {
          this.copySuccess = false;
        }, 2000);
      }
    },

    getMembers() {
      this.emails = [];

      axios
        .post("/students/get", {
          group: this.selectors.group,
          members: this.selectors.members,
          time: this.selectors.time
        })
        .then(response => {
          this.users = response.data;
          this.users.forEach(user => {
            this.emails.push(user.email);
          });
          this.generateEmailString();
        });
    },

    generateEmailString() {
      let mail = "";
      this.emails.forEach(email => {
        mail += email + "; ";
      });
      this.emailString = mail;
    }
  }
};
</script>
