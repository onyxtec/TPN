
<template>
  <div class="container-fluid pt-4">
    <div
      class="d-flex justify-content-between align-items-center"
      style="
        background: #ffffff;
        box-shadow: 0px 3.51471px 21.0882px rgba(24, 41, 47, 0.1);
        border-radius: 5.27206px;
        padding: 10px;
      "
    >
      <div class="ml-3">
        <img src="/images/logo/logo.png" alt="" />
      </div>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-nav" style="gap: 30px">
          <a class="nav-item nav-link active" href="#"
            >Home <span class="sr-only">(current)</span></a
          >
          <a class="nav-item nav-link" href="#">About</a>
          <a class="nav-item nav-link" href="#">Therapist</a>
          <a class="nav-item nav-link" v-bind:href="`/client/appointments/`"
           >Appointments</a

          >
          <a class="nav-item nav-link" href="#">Pricing</a>
          <a class="nav-item nav-link" href="#">Contact</a>
        </div>
      </nav>

      <div v-if="user" class="d-flex mr-3">
        <!-- <li class="nav-item dropdown dropdown-notification mr-25">
          <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"
            ><i class="ficon" data-feather="bell"></i
            ><span class="badge badge-pill badge-danger badge-up">5</span></a
          >
                  </li> -->
        <div class="d-md-inline d-none p-1 mt-2 client-name text">
          <p class="m-0" style="font-size: 23px">
            {{ this.currentclient.data.fullName }}
          </p>
          <span class="client-status" style="float: right">Client</span>
        </div>
        <div class="dropdown ml-3">
          <div
            class="d-inline p-1"
            id="dropdownMenuButton"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <img
              src="/images/avatars/user.png"
              width="54"
              height="54"
              class="rounded-circle d-inline-block align-top cursor-pointer"
              style="object-fit: cover; object-position: center"
            />
            <span class="client-status-online"></span>
          </div>
        </div>
      </div>
      <div class="d-flex" v-else>
        <a class="nav-item nav-link" v-bind:href="'/login'">Sign In</a>
        <button class="book-now">Book Now</button>
      </div>
    </div>
  </div>
</template>
<!-- choose one -->

<script>
export default {
  props: ["user"],
  data() {
    return {
      currentclient: {},
    };
  },
  mounted() {
    axios
      .get("/currentclient" + "/" + this.user)
      .then((response) => {
        console.log(response);
        this.currentclient = response.data;
      })
      .catch((error) => {
        console.log(error);
      });

  },
};

</script>


