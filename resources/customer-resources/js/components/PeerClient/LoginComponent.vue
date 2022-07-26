<template>
  <div class="container-fluid">
    <div class="row ">
      <div class="col-lg-5" style="background: #FAF6FE">
        <img class="mt-4 mx-5" src="/images/logo/logo.png" alt="">
        <div class="d-flex">
          <img class="img-fluid pl-3" src="/images/login/image.png" alt="flower">
          <div class="d-flex align-items-center text">
            <span>Your shelter from<br>all<span style="color: #8453A5;"> Mental</span>
              Health<br>issues</span>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="d-flex justify-content-end mx-5 mt-5">
          <p>New on our platform?</p> <a class="ml-2" v-bind:href="'register'"><span style="color:#A136C5">Create an
              account</span> </a>
        </div>
        <div style="margin-top:100px;">
          <div class="col-lg-6 offset-lg-3 mx-5 mt-5">
            <div class="col-lg-12 ml-5 pl-5">
              <h2 class="text-center mt-5">Welcome Back!</h2>
            </div>
          </div>
          <div class="col-lg-12 mt-5 ml-5 pl-5">
            <div class="col-lg-10 ml-5 pl-5">
              <button class="btn-active text-center rounded px-3 py-3 w-25 ml-3 pl-5 peerButton button">I'm
                a Peer</button>
              <button class="rounded text-center px-3 py-3 ml-3 w-25 ml-2 pl-5 clientButton button">I'm a
                Client</button>
            </div>
          </div>
          <ValidationObserver v-slot="{ handleSubmit }">
            <form @submit.prevent="handleSubmit(submit)" method="POST" nonvalidate="nonvalidate" class="mt-5">
              <span :class="message[0] ? 'd-block' : 'd-none'" class="text-danger error pl-3"><b>{{ message
              }}</b></span>
              <div class="col-lg-6 offset-lg-3 mx-5 mb-0">
                <div class="col-lg-12 ml-5 pl-5">
                  <label class="mt-5 ml-4 pl-4" for="Email">Email</label>
                </div>
                <div class="col-lg-12 ml-5 pl-5">
                  <ValidationProvider name="email" rules="required|email" v-slot="{ errors }" mode="lazy">
                    <input v-model="email" class="form-control align-center ml-5 input-size" type=""
                      placeholder="Enter your email" />
                    <span :class="errors[0] ? 'd-block' : 'd-none'" class="text-danger ml-5">{{
                        errors[0]
                    }}</span>
                  </ValidationProvider>
                </div>
              </div>
              <div class="col-lg-6 offset-lg-3 mx-5">
                <div class="col-lg-12 ml-5 pl-5">
                  <label class="mt-3 ml-4 pl-4" for="password">Password</label>
                </div>
                <div class="col-lg-12 ml-5 pl-5">
                  <ValidationProvider name="password" rules="required" v-slot="{ errors }" mode="lazy">
                    <input v-model="password" class="form-control align-center ml-5 input-size" type="password"
                      placeholder="Enter your password" />
                    <span :class="errors[0] ? 'd-block' : 'd-none'" class="text-danger ml-5">{{
                        errors[0]
                    }}</span>
                  </ValidationProvider>
                </div>
              </div>
              <div class="custom-control custom-checkbox checkbox mt-3">
                <input class="custom-control-input" type="checkbox" id="remember-me" name="remember-me" tabindex="3" />
                <label class="custom-control-label" for="remember-me"> Remember Me </label>
              </div>
              <div class="col-lg-6 mt-4 my-1">
                <button class="btn-login">Sign Up</button>
              </div>
            </form>
          </ValidationObserver>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import $ from "jquery";
export default {
  data() {
    return {
      email: "",
      password: "",
      message: "",
      error: [],
    };
  },
  methods: {
    submit() {
      axios
        .post('post-login', {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          if (response.data.message == "Plz verify your email to continue") {
            window.location.href = "/login";
          } else {
            this.credentials = response.data.data;
            window.location.href = "/";
          }
        })
        .catch(error => {
          var message = error.response.data.message;
          this.message = message
          console.log(message)
        });
    },
  },
};
$(function () {
  $(".peerButton").css({ 'background-color': '#8453a5', 'color': 'white', 'border-color': '#8453a5' })
  $('.peerButton').on('click', function () {
    $(".peerButton").css({ 'background-color': '#8453a5', 'color': 'white', 'border-color': '#8453a5' })
    $(".clientButton").css({ 'background-color': '#fff', 'color': 'black', 'border-color': '#8453a5' })

  });
  $('.clientButton').on('click', function () {
    $(".clientButton").css({ 'background-color': '#8453a5', 'color': 'white', 'border-color': '#8453a5' })
    $(".peerButton").css({ 'background-color': '#fff', 'color': 'black', 'border-color': '#8453a5' })
  });
});
</script>
<style>
.myerror {
  margin-left: 126;
}
</style>
