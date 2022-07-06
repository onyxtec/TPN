<template>
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Register v1 -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="javascript:void(0);" class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                    y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                    y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path"
                                            d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                            style="fill: currentColor"></path>
                                        <path id="Path1"
                                            d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                            fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                        </polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                            points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                        </polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                            points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <h2 class="brand-text text-primary ml-1">PeerNetwork</h2>
                    </a>

                    <h4 class="card-title mb-1">Sign Up as Client</h4>
                    <!-- <p class="card-text mb-2">Make your app management easy and fun!</p> -->

                    <form class="auth-login-form mt-2" @submit.prevent="submit" method="POST" nonvalidate="nonvalidate">
                        <div class="form-group">
                            <label for="register-fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" v-model="fullName" id="register-fullName" name="fullName"
                                 aria-describedby="register-fullName" tabindex="1" autofocus />
                        </div>
                        <div class="form-group">
                            <label for="register-email" class="form-label">Email</label>
                            <input type="text" class="form-control " id="register-email" name="email"
                                v-model="email" aria-describedby="register-email"
                                tabindex="2" />
                        </div>

                        <div class="form-group">
                            <label for="register-password" class="form-label">Password</label>
                            <div class="input-group input-group-merge form-password-toggle ">
                                <input type="password" v-model="password" class="form-control form-control-merge "
                                    id="register-password" name="password"
                                    aria-describedby="register-password" tabindex="3" />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="register-confirm-password" class="form-label">Confirm Password</label>
                            <div class="input-group input-group-merge form-confirm-password-toggle ">
                                <input type="password" v-model="confirm_password" class="form-control form-control-merge "
                                    id="register-confirm-password" name="confirm-password"
                                    aria-describedby="register-confirm-password" tabindex="3" />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="register-contact-no" class="form-label">Contact No</label>
                            <input type="tel" class="form-control " id="register-contact-no" name="contact-no"
                                v-model="contact_no" aria-describedby="register-contact-no"
                                tabindex="2" />
                        </div>

                            <div class="form-group">
                            <label for="register-emergency-contact" class="form-label">Emergency Contact No</label>
                            <input type="tel" class="form-control " id="register-emergency-contact" name="emergency-contact"
                                v-model="emergency_contact" aria-describedby="register-emergency-contact"
                                tabindex="2" />
                        </div>

                         <div class="form-group">
                            <label for="register-dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control " id="register-dob" name="dob"
                                v-model="dob" aria-describedby="register-dob"
                                tabindex="2" />
                        </div>

                          <div class="form-group">
                            <label for="register-address" class="form-label">Address</label>
                            <input type="text" class="form-control " id="register-address" name="address"
                                v-model="address" aria-describedby="register-address"
                                tabindex="2" />
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="register-privacy-policy"
                                    tabindex="4" />
                                <label class="custom-control-label" for="register-privacy-policy">
                                    I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" tabindex="5">Sign up</button>
                    </form>

                    <p class="text-center mt-2">
                        <span>Already have an account?</span>
                       <a  v-bind:href="'login'">
                        <span>Sign in instead</span>
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

            fullName: '',
            email: '',
            password: '',
            confirm_password: '',
            contact_no: '',
            emergency_contact: '',
            dob: '',
            address: '',
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