<template>
  <div>
    <h2 class="text-center mt-3 mb-5">Update Data Barang</h2>
    <form @submit="handleSubmit">
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              placeholder="input name"
              v-model="items.name"
            />
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input
              type="number"
              class="form-control"
              id="price"
              placeholder="input price"
              v-model="items.price"
            />
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input
              type="number"
              class="form-control"
              id="stock"
              placeholder="input stock"
              v-model="items.price"
            />
          </div>
        </div>
        <div class="col-sm-6">
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input
              type="file"
              class="form-control"
              id="i"
              placeholder="input image"
              ref="myFiles"
              @change="previewFiles"
            />
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea
          class="form-control"
          v-model="items.description"
          id="description"
          rows="3"
        ></textarea>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <router-link to="/" class="btn btn-danger mb-5">Back</router-link>
        </div>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-success float-end">
            Update
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      items: [],
      itemID: null,
    };
  },
  methods: {
    async fetchData() {
      this.itemID = this.$route.params.id;
      const response = await axios.get(`/api/barang/${this.itemID}`);
      console.log(this.itemID);
      this.items = response.data.data;
    },
    handleSubmit() {
      console.log(this.items);
      axios.put(`/api/barang/${this.itemID}`, this.items).then((response) => {
        console.log(response);
      });
    },
  },
  created() {
    // Panggil method fetchData saat pertama kali dijalankan
    this.fetchData();
  },
  mounted() {
    // Panggil method fetchData setiap kali nilai itemID berubah
    this.$watch("itemID", this.fetchData);
  },
};
</script>

<style>
</style>