<template>
  <div class="container">
    <div class="row">
      <div
        id="loginbox"
        style="margin-top: 50px"
        class="mainbox col-md-6 offset-md-3"
      >
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">Sign In</div>
            <div
              style="
                float: right;
                font-size: 80%;
                position: relative;
                top: -10px;
              "
            >
              <a href="#">Forgot password?</a>
            </div>
          </div>

          <div style="padding-top: 30px" class="panel-body">
            <div
              style="display: none"
              id="login-alert"
              class="alert alert-danger col-sm-12"
            ></div>

            <form @submit.prevent="login_user">
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"
                  ><i class="glyphicon glyphicon-user"></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  v-model="login_data.email"
                  placeholder="username or email"
                />
              </div>

              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"
                  ><i class="glyphicon glyphicon-lock"></i
                ></span>
                <input
                  type="password"
                  class="form-control"
                  v-model="login_data.password"
                  placeholder="password" autocomplete 
                />
              </div>

              <div style="margin-top: 10px" class="form-group">
                <!-- Button -->

                <div class="col-sm-12 controls">
                  <input type="submit" class="btn btn-success" value="Login" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-12 control">
                  <div
                    style="
                      border-top: 1px solid#888;
                      padding-top: 15px;
                      font-size: 85%;
                    "
                  >
                    Don't have an account!
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import { session } from "../helper";
// import router from '../index'
export default {
  data() {
    return {
      login_data: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    login_user() {
      axios
        .post("/api/login", {
          email: this.login_data.email,
          password: this.login_data.password,
        })
        .then((res) => {
          console.log(res)
          if (res.data.response) {
            this.$store.dispatch("setUserLoggedIn", res.data.response).module1;
            this.$store.dispatch("SetAccessCode", res.data.access_code).module1;
            this.$store.dispatch("setuserId", res.data.user_id).module1;

            // router.push('/about');
          } else {
            this.$store.dispatch("setUserLoggedIn", res.data.response).module1;
          }
        });
    },
  },
  created() {
    //console.log(session)
  },
};
</script>