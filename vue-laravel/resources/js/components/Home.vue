<template>
    <div class="container" >
    <form @submit.prevent="save_data">
    <label>Name</label>
    <input type="text" v-model="form_data.name" class="form-control"  />
    <br>
     <label>Email</label>
    <input type="text" v-model="form_data.email" class="form-control" />

    <br>
    <input type="submit" value="Submit" class="btn btn-primary"/>
</form>
    </div>
</template>

<script>

export default{
    data(){
        return{
            form_data:{
                name:'',
                email:''
            }
        }
    },
    methods:{
        save_data(){

            axios.post('/save',this.form_data).then(res=>{
                console.log(res.data)
                this.form_data.reset;
            })

           
            //console.log(this.form_data)
        }
    }
}

</script>