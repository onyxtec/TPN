<template>
  <div class="container-fluid">
    <div
      class="d-flex justify-content-between align-items-center"
      style="
        background: #ffffff;
        box-shadow: 0px 3.51471px 21.0882px rgba(24, 41, 47, 0.1);
        border-radius: 5.27206px;
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
          <a class="nav-item nav-link" href="#">Appointments</a>
          <a class="nav-item nav-link" href="#">Pricing</a>
          <a class="nav-item nav-link" href="#">Contact</a>
        </div>
      </nav>

      <div class="d-flex mr-3">
        <a class="nav-item nav-link" href="#">Sign In</a>
        <button class="book-now">Book Now</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>