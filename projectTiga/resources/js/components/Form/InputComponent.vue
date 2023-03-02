<template>
  <div>
    <h2 class="text-center mt-3 mb-5">Input Data Barang</h2>
    <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              placeholder="input name"
              v-model="form.name"
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
              v-model="form.price"
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
              v-model="form.stock"
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
        <!-- <label for="description" class="form-label">Description</label>
        <textarea
          class="form-control"
          v-model="form.description"
          id="description"
          rows="3"
        ></textarea> -->
        <label for="image" class="form-label">Video</label>
            <input
              type="file"
              class="form-control"
              id="i"
              placeholder="input image"
              ref="myFiles"
              @change="previewFiles"
            />
      </div>

      <div class="row">
        <div class="col-sm-6">
          <router-link to="/" class="btn btn-danger mb-5">Back</router-link>
        </div>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-success float-end">
            Submit
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
      form: {
        name: "",
        price: "",
        stock: "",
        description: "",
        image: null,
      },
    };
  },
  methods: {
    // handleSubmit() {
    //   console.log(this.form);
    //   axios.post("/api/barang", this.form).then((response) => {
    //     console.log(response);
    //   });
    // },
    handleSubmit() {
      console.log(this.form.image);
      let formData = new FormData();
      formData.append("name", this.form.name);
      formData.append("price", this.form.price);
      formData.append("stock", this.form.stock);
      formData.append("description", this.form.description);
      formData.append("image", this.form.image); // tambahkan field image ke objek FormData

      axios.post("/api/barang", formData).then((response) => {
        console.log(response);
      });
    },
    previewFiles(){
      this.form.image = this.$refs.myFiles.files[0];
    }
  },
};
</script>

<style>
</style>