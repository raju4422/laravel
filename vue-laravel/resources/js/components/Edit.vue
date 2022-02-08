<template>
<div>
    <div class="container">
            <h1>Edit</h1>

        <form @submit.prevent="update">

             <label>Name</label>
        <input type="hidden" id="id" v-model="id" class="form-control" />

          <input type="text" id="name" v-model="res_data.name" class="form-control" />
          <br />
          <label>Email</label>
          <input type="text" id="email" v-model="res_data.email" class="form-control" />

          <br />
          <input type="submit" value="Submit" class="btn btn-primary" />

        </form>
    </div>
</div>
</template>

<script>

import router from '../index'
import { session } from "../helper.js";
import Header from '../components/Header.vue'


export default {
      components:{
    Header
  },
    data(){
        return {
            id:0,
            res_data:{
               
                
            }
        }
    },
    methods:{

        update(){


            axios.post('/api/update',{id:this.id,name:this.res_data.name,email:this.res_data.email}).then(res=>{
                console.log(res);
                this.navigate()
            })
            console.log(this.res_data)
        },
         navigate() {
                router.go(-1);
            }

    },

    created(){
        this.id = this.$store.state.module1.user_id
        axios.post('/api/getdatabyid',{id:this.id}).then(res=>{
        this.res_data=res.data

        });

       // console.log(session)
    }
}
</script>