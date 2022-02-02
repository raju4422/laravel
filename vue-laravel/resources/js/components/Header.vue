<template>
<div>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <router-link to ="/" class="navbar-brand" >Navbar</router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        
        <router-link to="/" class="nav-link"  exact>Home<span class="sr-only">(current)</span></router-link>

      </li>
      <li class="nav-item">
        <router-link to="/about" class="nav-link" exact>About</router-link>
      </li>
      <li class="nav-item">
      <router-link to="/contact" class="nav-link" exact>Contact</router-link>

      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
      <li class="nav-item" v-if="$store.state.isLoggedIn">
        <a class="nav-link " @click="logout">Logout</a>
      </li>
      <li class="nav-item" v-if="!$store.state.isLoggedIn">
        <router-link class="nav-link " to="/login">Login</router-link>
      </li>
    </ul>
  </div>
  {{$store.state.name}}
 
</nav>
</div>
        
</template>

<script>
import {session} from '../helper'

export default {

  data(){
    return{
      is_logged:''
    }
  },
  methods:{
    logout(){
  this.$store.dispatch('logoutUser')
    }
  },
  created(){
    

  }
   
}
</script>