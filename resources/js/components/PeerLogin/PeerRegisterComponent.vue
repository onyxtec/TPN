<template>
  <div class="container-fluid">
    <div class="row ">
      <div class="col-lg-5" style="background: #FAF6FE" >
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
          <p>Already Have an
            Account?</p> <a class="ml-2" v-bind:href="'login'"><span style="color:#A136C5">SignIn Instead</span> </a>
        </div>
        <div class="col-lg-6 offset-lg-3 mt-5">
          <h3 class="d-flex justify-content-center">Welcome!</h3>
          <p class="m-0">There is no one who loves pain itself, who seeks after it and wants to have it.</p>
        </div>
        <div class="col-lg-6 offset-lg-3 mt-4">
          <button class="px-3 py-3  rounded"
            style="border-color: #8453A5; border-radius: 25px; width: 220px; background-color: #8453A5; color: #FAF6FE;">I'm
            a Peer</button>
          <button class="px-3 py-3 ml-3 rounded" style="border-color: #8453A5; border-radius: 25px; width: 220px;">I'm a
            Client</button>
        </div>
         <ValidationObserver v-slot="{ handleSubmit }">
        <form  @submit.prevent="handleSubmit(submit)" method="POST" nonvalidate="nonvalidate">
          <div class="col-lg-6 offset-lg-3 mt-5">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="fullName">Full Name</label>
            </div>
            <div class="col-lg-10">
          <ValidationProvider name="fullName" rules="required" v-slot="{ errors }">
              <input v-model="fullName" class="form-control input-size" type="text"
                placeholder="Enter your Full Name" />
                <span :class="errors[0] ? 'd-block' : 'd-none'" class="text-danger pl-3">{{ errors[0] }}</span>
                          </ValidationProvider>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 mt-4">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="email">Email address</label>
            </div>
            <div class="col-lg-10">
              <input v-model="email" type="email" class="form-control input-size" placeholder="Enter email" />
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 mt-4">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="password">Password</label>
            </div>
            <div class="col-lg-10">
              <input v-model="password" type="password" class="form-control input-size" placeholder="Enter Password" />
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 mt-4">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="confirm_password">Confirm Password</label>
            </div>
            <div class="col-lg-10">
              <input v-model="confirm_password" type="password" class="form-control input-size"
                placeholder="Confirm Password" />
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 mt-4">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="contact_no">Contact No</label>
            </div>
            <div class="col-lg-10">
              <input v-model="contact_no" type="tel" class="form-control input-size" placeholder="Contact no" />
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 mt-4">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="dob">Date of Birth</label>
            </div>
            <div class="col-lg-10">
              <input v-model="dob" type="date" class="form-control input-size" placeholder="Date of Birth" />
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 mt-4">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="specialization_type">Specialization Type</label>
            </div>
            <div class="col-lg-10">
              <select type="text" class="form-control" style=" height:50px;" v-model="specialization_type">
                <option disabled selected>Select Your Specialization</option>
                <option>Mental Health</option>
                <option>Substance Use Disorder</option>
                <option>Both</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 mt-4"
            v-if="specialization_type == 'Substance Use Disorder' || specialization_type == 'Both'">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="substance_use">Substance Use Disorder</label>
            </div>
            <div class="col-lg-10">
              <select type="text" class="form-control" style=" height:50px;" v-model="sub_type">
                <option disabled selected>Select Your Substance Disorder</option>
                <option>Cocaine</option>
                <option>Opiates</option>
                <option>Marijuana</option>
                <option>Alcohol</option>
                <option>Benzodiazepines</option>
                <option>Heroin</option>
                <option>Fentanyl</option>
                <option>Other</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 offset-lg-3 mt-4" v-if="sub_type == 'Other'">
            <div class="col-lg-12 text-left">
              <label class="m-0 font-label" for="other">Other</label>
            </div>
            <div class="col-lg-10">
              <input type="text" class="form-control input-size" placeholder="Other" />
            </div>
          </div>

          <div class="col-lg-6 offset-lg-3 mt-4 my-1">
            <button class="rounded button">Sign Up</button>
          </div>
        </form>
        </ValidationObserver>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {

      fullName: '',
      email: '',
      password: '',
      confirm_password: '',
      contact_no: '',
      dob: '',
      address: '',
      specialization_type: '',
      sub_type: '',
      otherValue: '',
      errors: '',
    }
  },
  methods: {
    submit() {
      axios.post('/peer/register', {
        fullName: this.fullName,
        email: this.email,
        password: this.password,
        confirm_password: this.confirm_password,
        contact_no: this.contact_no,
        dob: this.dob,
        address: this.address,
        specialization_type: this.specialization_type,
        sub_type: this.sub_type === 'Other' ? this.otherValue : this.sub_type,
      })
        .then((response) => {
          this.credentials = response.data.data
          window.location.href = '/peer/login';
        })
        .catch(error => {
        })
    }
  }
}
</script>
<style>
.font-label {
  font-size: 13px;
}

.input-size {
  height: 50px;
}

.button {
  width: 80%;
  margin-left: 10px;
  background-color: #491859;
  height: 50px;
  color: white;
}
</style>