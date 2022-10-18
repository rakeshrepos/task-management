<script>
export default {
  data() {
    return {
      clients: {},
    };
  },
  mounted() {
    this.getClients();
  },
  methods: {
    getClients() {
      axios.get("/client").then((response) => {
        this.clients = response.data;
        console.log(this.clients);
      });
    },
  },
};
</script>
<template>
  <div>
    <table>
      <tr class="bg-indigo-100">
        <td>Name</td>
        <td>Email</td>
        <td>Number</td>
        <td>Client Code</td>
        <td>Action</td>
      </tr>
      <tr v-for="client in clients" :key="client.id">
        <td>{{ client.name }}</td>
        <td>{{ client.email }}</td>
        <td>{{ client.number }}</td>
        <td>{{ client.client_code }}</td>
        <td>
          <a
            :href="'/client/' + client.id"
            class="
              text-white
              bg-blue-600
              focus:ring-4 focus:outline-none focus:ring-blue-300
              rounded-lg
              border border-gray-200
              text-sm
              font-medium
              px-5
              py-2.5
              focus:z-10
              dark:bg-gray-700
              dark:text-gray-300
              dark:border-gray-500
              dark:hover:text-white
              dark:hover:bg-gray-600
              dark:focus:ring-gray-600
            "
            >View</a
          >
        </td>
      </tr>
    </table>
  </div>
</template>