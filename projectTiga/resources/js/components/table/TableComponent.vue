<template>
  <table id="table_id" class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, index) in items" :key="item.message">
        <th scope="row">{{ index + 1 }}</th>
        <td>{{ item.name }}</td>
        <td>{{ item.price }}</td>
        <td>{{ item.stock }}</td>
        <td>{{ item.description }}</td>
        <td>
          <img :src="'/storage/image/' + item.image" alt="image" width="200">
          <!-- {{ 'public/storage/image/'+item.image }} -->
        </td>
        <td>
          <router-link
            :to="{ name: 'update', params: { id: item.id } }"
            class="btn btn-warning"
            >Update</router-link
          >
          <button @click="deleteItem(item.id)" class="btn btn-danger">
            Delete
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data() {
    return {
      items: [],
    };
  },
  methods: {
    async fetchData() {
      const response = await axios.get("/api/barang");
      this.items = response.data.data;
    },

    deleteItem(id) {
      console.log(id);
      axios
        .delete(`/api/barang/${id}`)
        .then((response) => {
          // Berhasil dihapus dari server, lakukan aksi selanjutnya jika diperlukan
          console.log(response.data);
          this.fetchData();
        })
        .catch((error) => {
          // Terjadi error saat menghapus data dari server, tampilkan pesan error jika diperlukan
          console.error(error);
        });
    },
  },
  created() {
    // Panggil method fetchData saat pertama kali dijalankan
    this.fetchData();
  },
};
</script>

<style>
</style>