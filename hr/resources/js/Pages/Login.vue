<template>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Aplikasi</b>SDM</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login Untuk Melanjutkan</p>

                <form method="post" @submit.prevent="loginCheck">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" v-model="formData.email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" v-model="formData.password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

const formData = ref({
    email: '',
    password: ''
})

async function loginCheck() {
    try {
        await axios.post($root_login, formData.value)
        window.location.reload()
    } catch (e) {
        alert(e)
    }
}
</script>
