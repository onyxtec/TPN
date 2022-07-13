<template>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                                        <b>Client Registration</b>
                                    </p>
                                    <form class="mx-1 mx-md-4" @submit.prevent="submit" method="POST"
                                        nonvalidate="nonvalidate">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" name="fullName"
                                                    class="form-control" v-model="fullName" />
                                                <label class="form-label" for="form3Example3c">Enter Full Name</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email"
                                                    class="form-control" v-model="email" />
                                                <label class="form-label" for="form3Example3c">Enter Email
                                                    Address</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password" id="form3Example4c"
                                                    class="form-control" v-model="password" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="confirm_password" id="form3Example4c"
                                                    class="form-control" v-model="confirm_password" />
                                                <label class="form-label" for="form3Example4c">Confirm Password</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="no" id="form3Example3c" name="contact_no"
                                                    class="form-control" v-model="contact_no" />
                                                <label class="form-label" for="form3Example3c">Enter Contact No</label>
                                            </div>
                                        </div>
                                          <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="no" id="form3Example3c" name="emergency_contact"
                                                    class="form-control" v-model="emergency_contact" />
                                                <label class="form-label" for="form3Example3c">Enter Emergency Contact No</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="date" id="form3Example3c" name="dob" class="form-control"
                                                    v-model="dob" />
                                                <label class="form-label" for="form3Example3c">Enter Date of
                                                    Birth</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" name="address" class="form-control"
                                                    v-model="address" />
                                                <label class="form-label" for="form3Example3c">Enter Address</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <select class="form-control" v-model="problem_type"
                                                    id="register-problem_type" name="problem_type">
                                                    <option disabled selected>Select Your Problem</option>
                                                    <option>Mental Health</option>
                                                    <option>Substance Use Disorder</option>
                                                </select>
                                                <label class="form-label" for="form3Example4c">Presenting Problem</label>
                                            </div>
                                        </div>
                                        <div v-if="problem_type == 'Substance Use Disorder'"
                                            class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <select class="form-control" v-model="sub_type"
                                                    id="problem_type" name="problem_type">
                                                    <option disabled selected>Select Option</option>
                                                    <option>Methamphetamine</option>
                                                    <option>Cocaine</option>
                                                    <option>Opiates</option>
                                                    <option>Marijuana</option>
                                                    <option>Alcohol</option>
                                                    <option>Benzodiazepines</option>
                                                    <option>Heroin</option>
                                                    <option>Fentanyl</option>
                                                    <option>Other</option>
                                                </select>
                                                <label class="form-label" for="form3Example4c">Substance Use
                                                    Disorder</label>
                                            </div>
                                        </div>
                                        <div v-if="sub_type == 'Other'" class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control " id="register-other"
                                                    name="other" v-model="otherValue" aria-describedby="register-other"
                                                    tabindex="2" />
                                                <label class="form-label" for="form3Example3c">Other Disorder</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Register
                                            </button>
                                        </div>
                                        <a v-bind:href="'login'"
                                            class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">Already Have an
                                            Account? SignIn</a>
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
  
              fullName: '',
              email: '',
              password: '',
              confirm_password: '',
              contact_no: '',
              dob: '',
              address: '',
              emergency_contact: '',
              problem_type: '',
              sub_type: '',
              otherValue: '',
          }
      },
      methods: {
          submit() {
              axios.post('/client/register', {
                  fullName: this.fullName,
                  email: this.email,
                  password: this.password,
                  confirm_password: this.confirm_password,
                  contact_no: this.contact_no,
                  emergency_contact: this.emergency_contact,
                  dob: this.dob,
                  address: this.address,
                  problem_type: this.problem_type,
                  sub_type: this.sub_type === 'Other' ? this.otherValue : this.sub_type,
              })
                  .then((response) => {
                      this.credentials = response.data.data
                      window.location.href = '/client/login';
                  })
                  .catch(error => {
                  })
          }
      }
  
  }
  </script>
