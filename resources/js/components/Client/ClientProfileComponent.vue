<template>
    <div class="container-fluid d-flex flex-column pt-4">
        <div class="row d-flex m-1 profile-div">
            <div class="col-lg-6 d-flex justify-content-start align-items-center div-img-name-btn pt-2">
                <img src="/images/avatars/user.png" width="123px" height="100px"
                    class="rounded-circle d-inline-block align-top cursor-pointer"
                    style="object-fit: cover; object-position: center" />
                <h3 class="user-name mb-0">{{ name }} </h3>
            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center div-img-name-btn pt-2">
                <button class="text mt-4 m-2 bg-white">Edit</button>
                <button class="text mt-4 m-2 bg-white">Copy Url</button>
            </div>
            <div class="col-lg-12 d-flex align-items-end">
                <ul class="d-flex">
                    <li class="menu pb-2">
                        <a href="" class="text active">General Information</a>
                    </li>
                    <li class="menu pb-2"><a href="" class="text">My Bookings</a></li>
                    <li class="menu pb-2"><a href="" class="text">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid d-flex flex-column mt-3 ml-2 mr-3 general">
            <p class="mt-3 input">General Information</p>
        </div>
        <div class="row mb-5">
            <div class="col-lg-6 mt-5">
                <h5 class="input">Full Name</h5>
                <h5 class="input mt-4">Email</h5>
                <h5 class="input mt-4">Contact No</h5>
                <h5 class="input mt-4">Emergency Contact</h5>
                <h5 class="input mt-4">Date of Birth</h5>
                <h5 class="input mt-4">Address</h5>
                <h5 class="input mt-4">Problem Type</h5>
            </div>
            <div class="col-lg-6 mt-5" v-for="client in client" :key="client.id">
                <h5 class="input">{{ client.fullName }}</h5>
                <h5 class="input mt-4">{{ client.email }}</h5>
                <h5 class="input mt-4">{{ client.contact_no }}</h5>
                <h5 class="input mt-4">{{ client.emergency_contact }}</h5>
                <h5 class="input mt-4">{{ client.dob }}</h5>
                <h5 class="input mt-4">{{ client.address }}</h5>
                <h5 class="input mt-4 ">{{ client.problem_type }}{{ client.sub_type }}</h5>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: this.data[0].fullName,
        };
    },
    props: ["client"],
    mounted() {
    }
}
</script>