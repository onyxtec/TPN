<template>
  <div class="auth-wrapper auth-v1 px-2">
    <div class="auth-inner py-2">
      <!-- Login v1 -->
      <div class="card mb-0">
        <div class="card-body">
            <a href="javascript:void(0);" class="brand-logo">
                        <img max-width="200px" height="80"
                            src="/images/logo/logo.png"
                            class="attachment-full size-full" alt="" loading="lazy"
                            sizes="(max-width: 380px) 100vw, 380px">
                    </a>
          <form class="auth-login-form mt-2" @submit.prevent="submit" method="POST" nonvalidate="nonvalidate">
            <div class="form-group">
              <label for="login-email" class="form-label">Email</label>
              <input type="text" class="form-control" id="login-email" name="email" placeholder="john@example.com"
                aria-describedby="login-email" tabindex="1" autofocus v-model="email" />
            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label for="login-password">Password</label>
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                <input type="password" class="form-control form-control-merge" id="login-password" name="password"
                  tabindex="2" v-model="password" aria-describedby="login-password" />
                <div class="input-group-append">
                  <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="remember-me" name="remember-me" tabindex="3" />
                <label class="custom-control-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign in</button>
          </form>
          <p class="text-center mt-2">
                        <span>New on our Platform</span>
                         <a  v-bind:href="'register'">
                        <span>Create an Account</span>
                         </a> 
                    </p>
                </div>
            </div>
            <!-- /Register v1 -->
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    submit() {
      axios
        .post("/login", {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          this.credentials = response.data.data;
          console.log(this.credentials);
          window.location.href = "/peers";
        })
        .catch((error) => {
         });
    },
  },
};
</script>