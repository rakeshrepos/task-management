<script>
import LaravelVuePagination from "laravel-vue-pagination";
export default {
  components: {
    Pagination: LaravelVuePagination,
  },
  data() {
    return {
      clients: {},
    };
  },
  mounted() {
    this.getClients();
  },
  methods: {
    getClients(page = 1) {
      axios.get("/client?page=" + page).then((response) => {
        this.clients = response.data;
        console.log(response);
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
        <td>OTP</td>
        <td>Action</td>
      </tr>
      <tr v-for="client in clients.data" :key="client.id">
        <td>{{ client.name }}</td>
        <td>{{ client.email }}</td>
        <td>{{ client.number }}</td>
        <td>{{ client.client_code }}</td>
        <td>{{ client.otp }}</td>
        <td>
          <a
            :href="'/client/' + client.id"
            class="text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 focus:z-10"
            >View</a
          >
        </td>
      </tr>
    </table>

    <Pagination :data="clients" @pagination-change-page="getClients"></Pagination>
  </div>
</template>
