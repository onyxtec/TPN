<template>
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Register v1 -->
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
                            <label for="register-username" class="form-label">Username</label>
                            <input type="text" class="form-control" v-model="name" id="register-username" name="name"
                                placeholder="johndoe" aria-describedby="register-username" tabindex="1" autofocus />
                        </div>
                        <div class="form-group">
                            <label for="register-email" class="form-label">Email</label>
                            <input type="text" class="form-control " id="register-email" name="email"
                                placeholder="john@example.com" v-model="email" aria-describedby="register-email"
                                tabindex="2" />
                        </div>

                        <div class="form-group">
                            <label for="register-password" class="form-label">Password</label>

                            <div class="input-group input-group-merge form-password-toggle ">
                                <input type="password" v-model="password" class="form-control form-control-merge "
                                    id="register-password" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="register-password" tabindex="3" />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
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
                       <a  v-bind:href="'/'">
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

            name: '',
            email: '',
            password: '',
        }
    },
    methods: {
        submit() {
            axios.post('/register', {
                name: this.name,
                email: this.email,
                password: this.password,
            })
                .then((response) => {
                    this.credentials = response.data.data
                    console.log(this.user)
                    window.location.href = '/';
                })
                .catch(error => {
                })
        }
    }

}
</script>