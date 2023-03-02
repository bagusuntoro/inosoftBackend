<template>
  <table id="table_id" class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Image</th>
        <th scope="col">Video</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(item, index) in items" :key="item.message">
        <th scope="row">{{ index + 1 }}</th>
        <td>{{ item.name }}</td>
        <td>{{ item.price | formatRupiah }}</td>
        <td>{{ item.stock }}</td>
        <td>
          <img :src="'/storage/image/' + item.image" alt="image" width="200" />
        </td>
        <td>
          <video width="300" controls autoplay>
            <source :src="'/storage/video/' + item.video" type="video/mp4" />
            Your browser does not support HTML video.
          </video>
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
  filters: {
    formatRupiah(value) {
      let val = (value / 1).toFixed(0).replace(".", ",");
      return "Rp " + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    },
  },

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