<template>
  <div class="container pt-5">
    <div class="row">
      <div class="col-md-6">
        <table class="table table-bordered">
          <thead class="">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in users_data" :key="item.id">
              <td scope="row">{{ item.name }}</td>
              <td>{{ item.email }}</td>
              <td>
                <button class="btn btn-primary">Edit</button>&nbsp;<button
                  class="btn btn-primary"
                  v-on:click="delete(item.id)"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <form @submit.prevent="save_data">
          <label>Name</label>
          <input type="text" v-model="form_data.name" class="form-control" />
          <br />
          <label>Email</label>
          <input type="text" v-model="form_data.email" class="form-control" />

          <br />
          <input type="submit" value="Submit" class="btn btn-primary" />
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form_data: {
        name: "",
        email: "",
      },
      users_data: [],
    };
  },
  methods: {
    save_data() {
      axios.post("/api/save", this.form_data).then((res) => {
        this.getData();
        this.form_data.reset;
      });

      //console.log(this.form_data)
    },

    getData() {
      axios.get("/api/getdata").then((res) => {
        this.users_data = res.data;
        console.log(this.users_data);
      });
    },
    delete(id) {
      if (confirm("Do you want to delete")) {
        axios.delete(`/api/delete/${id}`).then((res) => {
          this.getData();
        });
      }
    },
  },
  created() {
    this.getData();
  },
};
</script>