<template>
  <div>
    <div v-if="login_status" :key="$store.state.module1.isLoggedIn">
      <Header></Header>
      <div id="layoutSidenav">
        <SideNav></SideNav>
        <Body></Body>
      </div>
      <Footer></Footer>
    </div>
    <div v-if="!login_status" :key="$store.state.module1.isLoggedIn">
      <Login></Login>
    </div>
  </div>
</template>

<script>
import Home from "./Home";
import About from "./About";
import Header from "./Header";
import Footer from "./Footer";
import SideNav from "./SideNav";
import Body from "./Body";
import Login from "./Login";
export default {
  components: {
     Login,
    Home,
     About,
    Header,
     SideNav,
     Body,
     Footer
  },
  data() {
    return {
      login_status: false,
    };
  },
  updated(){
  // console.log('123')
   this.login_status = this.$store.state.module1.isLoggedIn;
  },
  created() {
    this.login_status = this.$store.state.module1.isLoggedIn;
  },
};
</script>