<template>
    <div>
        Contact Us
        <div v-for = "item in res_data" :key="item.id">
            {{item.name}}
        </div>
    </div>
</template>


<script>
export default{
    data(){
    return{
        res_data:[]
    }
    },
    methods:{
         getData() {
      axios.get("/api/getdata").then((res) => {
          this.res_data = res.data.data
        console.log(res)
        
      });
         }
    },
    
    created(){
         this.getData();
    }

}


</script>