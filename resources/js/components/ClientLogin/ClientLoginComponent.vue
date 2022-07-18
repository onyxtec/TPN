<template>
  <section class="vh-100" >
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                   <b>Client Login</b> 
                  </p>
                  <form class="mx-1 mx-md-4" @submit.prevent="submit" method="POST" nonvalidate="nonvalidate">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example3c" name="email" class="form-control" v-model="email" />
                        <label class="form-label" for="form3Example3c">Enter Email Address</label>
                      </div>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" id="form3Example4c" class="form-control"
                          v-model="password" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">
                        Login
                      </button>
                    </div>
                    <a v-bind:href="'register'" class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">Don't have an
                      account? Sign up</a>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
        .post('post-login', {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          this.credentials = response.data.data;
          console.log(this.credentials);
          window.location.href = "/a";
        })
        .catch((error) => {
        });
    },
  },
};
</script>