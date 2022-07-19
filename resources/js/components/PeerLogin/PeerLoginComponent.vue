<template>
  <div class="container-fluid">
    <div class="row ">
      <div class="col-lg-5" style="background: #FAF6FE">
        <img class="mt-4 mx-5" src="/images/login/logo.png" alt="">
        <div class="d-flex">
          <img class="img-fluid pl-3" src="/images/login/image.png" alt="flower" style="height: 95vh;">
          <div class="d-flex align-items-center" style="font-size: 35px; margin-top: -215px; margin-left: -220px;">
            <span>Your shelter <br> From All <br><span style="color: #8453A5;">Mental</span>
              Health<br>Issues</span>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="d-flex justify-content-end mx-5 mt-5">
          <p>New on our platform?</p> <a class="ml-2" v-bind:href="'register'"><span style="color:#A136C5">Create an
              account</span> </a>
        </div>
        <div class="col-lg-6 offset-lg-3 mt-5">
          <h3 class="d-flex justify-content-center">Welcome Back!</h3>
        </div>
        <div class="col-lg-6 offset-lg-3 mt-4">
          <button class="btn-active px-3 py-3 rounded peerButton button">I'm
            a Peer</button>
          <button class="px-3 py-3 ml-3 rounded clientButton button">I'm a
            Client</button>
        </div>
        <form @submit.prevent="submit" method="POST" nonvalidate="nonvalidate" class="mt-5">
        <span>{{error.message}}</span>
          <div class="col-lg-6 mx-5 mt-5">
            <div class="col-lg-12 text-left">
              <label class="mt-5 font-label label-box" for="Email">Email</label>
            </div>
            <div class="col-lg-10">
              <input v-model="email" class="form-control login-input" type="email"
                placeholder="Enter your Email Address" />
            </div>
          </div>
          <div class="col-lg-6 mx-5">
            <div class="col-lg-12 text-left">
              <label class=" font-label label-box" for="password">Password</label>
            </div>
            <div class="col-lg-10">
              <input v-model="password" class="form-control login-input" type="password"
                placeholder="Enter your Password" />
            </div>
          </div>
          <div class="custom-control custom-checkbox checkbox mt-3">
                <input class="custom-control-input" type="checkbox" id="remember-me" name="remember-me" tabindex="3" />
                <label class="custom-control-label" for="remember-me"> Remember Me </label>
              </div>
          <div class="col-lg-6 mt-4 my-1">
            <button class="rounded button-login">Sign Up</button>
          </div>
        </form>
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
      error: "",
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
          console.log(response.data)
          this.credentials = response.data.data;
          window.location.href = "/abc";
        })
        .catch(error => {
                   console.log( error.response)
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