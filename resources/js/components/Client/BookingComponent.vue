<template>
  <div class="container-fluid d-flex flex-column pt-4">
    <div class="row d-flex m-1 profile-div">
      <div
        class="col-lg-6 d-flex justify-content-start align-items-center div-img-name-btn pt-2"
      >
        <img
          src="/images/avatars/user.png"
          width="123px"
          height="100px"
          class="rounded-circle d-inline-block align-top cursor-pointer"
          style="object-fit: cover; object-position: center"
        />
        <p class="user-name mb-0">Samra Abbas</p>
      </div>
      <div
        class="col-lg-6 d-flex justify-content-end align-items-center div-img-name-btn pt-2"
      >
        <button class="text mt-4 m-2 bg-white">Edit</button>
        <button class="text mt-4 m-2 bg-white">Copy Url</button>
      </div>
      <div class="col-lg-12 d-flex align-items-end">
        <ul class="d-flex">
          <li class="menu pb-2">
            <a href="" class="text">General Information</a>
          </li>
          <li class="menu pb-2"><a href="" class="text">My Bookings</a></li>
          <li class="menu pb-2"><a href="" class="text">Settings</a></li>
        </ul>
      </div>
    </div>
    <div style="solid black 1px" class="d-flex flex-column mt-2">
      <div>
        <h3 class="mt-3" style="color: #8453a5; font-style: Roboto">
          Appointments
        </h3>
      </div>

      <div class="row d-flex align-items-end">
        <div class="col-lg-6">
          <ul style="padding-left: 18px" class="d-flex">
            <li class="menu pr-2 pb-2"><a href="" class="text">Upcoming</a></li>
            <li class="menu pr-2 pb-2">
              <a href="" class="text">Completed</a>
            </li>
            <li class="menu pr-2 pb-2"><a href="" class="text">Canceled</a></li>
          </ul>
        </div>
        <div
          class="col-lg-6 d-flex justify-content-end pb-2"
          style="padding-right: 18px"
        >
          <span class="mr-3 search-span">Search</span>
          <input
            type="text"
            name="search"
            id="search"
            class="p-2 search-input"
          />
        </div>
      </div>
      <hr style="" class="mb-6 mt-0" />
    </div>
    <div class="card">
      <div class="card-datatable table-responsive pt-0">
        <table class="user-list-table table">
          <thead class="thead-light">
            <tr>
              <!-- <th></th> -->
              <th>THERAPIST NAME</th>
              <th>SERVICE</th>
              <th>DATE AND TIME</th>
              <th>DURATION</th>
              <th>PRICE</th>
              <th>STATUS</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <!-- {{this.bookings}} -->
            <tr v-for="item in bookings" :key="item.id">
              <td>{{ item.employee }}</td>
              <td>{{ item.serviceNames }}</td>
              <td>{{ item.sessionDateTime }}</td>
              <td>{{ item.duration }}</td>
              <td>{{ item.priceCharged }}</td>
              <td v-if="item.priceCharged == 0">Payment pending</td>
              <td v-else>Paid</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      bookings: [],
    };
  },
  mounted() {
    axios.get("/clientbookings").then((response) => {
      //  console.log(response.data.data);
      this.bookings = response.data.data.bookings;
      console.log(this.bookings);
    });
  },
};
</script>
<style lang="scss">

</style>
