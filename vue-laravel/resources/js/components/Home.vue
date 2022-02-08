<template>
  <div class="position-relative" style="z-index: 1">

     <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <hr />
    <!-- <Header/> -->
    <!-- <div class="position-absolute loading"></div> -->
    <!-- {{$store.state.module1.access_code}} -->
    <div class="container position-relative pt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Users data
            </div>
            <div class="card-body table-responsive">
              <table id="" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Manage</th>
                  </tr>
                </thead>

                <tbody v-if="users_data.length">
                  <tr v-for="item in users_data" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.email }}</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>
                      <router-link
                        class="btn btn-primary"
                        to="edit"
                        >Edit</router-link
                      >&nbsp;
                      <button
                        type="button"
                        class="btn btn-primary"
                        v-on:click.native="deletePost(item.id)"
                      >
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-none">
          <div v-if="errors.length > 0">{{ errors }}</div>
          <form @submit.prevent="save_data">
            <label>Name</label>
            <input type="text" v-model="form_data.name" class="form-control" />
            <span>{{ errors.name }}</span>
            <br />
            <label>Email</label>
            <input type="text" v-model="form_data.email" class="form-control" />

            <br />
            <input type="submit" value="Submit" class="btn btn-primary" />
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { loader, session } from "../helper.js";
import Header from "../components/Header.vue";
export default {
  components: {
    Header,
  },
  data() {
    return {
      form_data: {
        name: "",
        email: "",
      },
      users_data: [],
      loading: false,
      errors: [],
    };
  },
  methods: {
    save_data() {
      this.errors = [];
      if (!this.form_data.name) {
        this.errors.push("First name required");
      }
      if (!this.form_data.email) {
        this.errors.push("email name required");
      }

      if (this.errors.length == 0) {
        axios.post("/api/save", this.form_data).then((res) => {
          this.getData();
          this.form_data.reset;
        });
      } else {
        console.log(this.errors);
      }

      //console.log(this.form_data)
    },

    getData() {
      axios.get("/api/getdata").then((res) => {
        this.users_data = res.data.data;
      });
    },
    deletePost(id) {
      console.log("hello");
      if (confirm("Do you want to delete")) {
        axios
          .post("/api/delete/", { user_id: id })
          .then((res) => {
            this.getData();
          })
          .error((error) => {
            console.log(error);
          });
      }
    },
  },
  created() {
    this.getData();
    loader();
  },
};
</script>

<style>
.loading {
  width: 100%;
  height: 100%;
  background-color: lightblue;
  opacity: 0.5;
}
</style>