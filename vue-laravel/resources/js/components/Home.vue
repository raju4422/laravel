<template>

 

  <div class="position-relative" style="z-index: 1">
    <!-- <Header/> -->
    <!-- <div class="position-absolute loading"></div> -->
    <div class="container position-relative pt-5">
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
                  <router-link
                    class="btn btn-primary"
                    :to="{ name: 'edit', params: { id: item.id } }"
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
        <div class="col-md-6">
          <div v-if="errors.length>0">{{errors}}</div>
          <form @submit.prevent="save_data">
            <label>Name</label>
            <input type="text" v-model="form_data.name" class="form-control" />
            <span>{{errors.name}}</span>
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
import { loader,session } from "../helper.js";
import Header from '../components/Header.vue'
export default {
  components:{
    Header
  },
  data() {
    return {
      form_data: {
        name: "",
        email: "",
      },
      users_data: [],
      loading: false,
      errors:[]
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

      if(this.errors.length==0){
      axios.post("/api/save", this.form_data).then((res) => {
        this.getData();
        this.form_data.reset;
      });
      }else{
        console.log(this.errors)
      }

      //console.log(this.form_data)
    },

    getData() {
      axios.get("/api/getdata").then((res) => {
        this.users_data = res.data;
      });
    },
    deletePost(id) {
      console.log("hello");
      if (confirm("Do you want to delete")) {
        axios.post("/api/delete/", { user_id: id }).then((res) => {
          this.getData();
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