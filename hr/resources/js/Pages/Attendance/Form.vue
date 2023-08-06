<style>
@import '@vuepic/vue-datepicker/dist/main.css';
</style>

<template>
    <Layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Kehadiran</h1>
                        </div>
                        <div class="col-sm-6 text-right">

                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <form method="post" @submit.prevent="submitForm">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Karyawan</label>
                                            <select name="employee_id" id="select-karyawan" required class="form-control">
                                                <option value="">Pilih Karyawan</option>
                                                <option v-for="employee in props.employees" :key="employee.id" :value="employee.id">{{ employee.name }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <VueDatePicker v-model="formData.date" :required="true" locale="id-ID" model-type="yyyy-MM-dd" position="left" format="yyyy-MM-dd" :auto-apply="true" placeholder="YYYY-MM-DD"></VueDatePicker>
                                        </div>
                                        <div class="form-group">
                                            <label>Masuk</label>
                                            <VueDatePicker time-picker-inline v-model="formData.in" :required="true" locale="id-ID" model-type="yyyy-MM-dd hh:mm:ss" position="left" format="yyyy-MM-dd hh:mm:ss" :auto-apply="true" placeholder="YYYY-MM-DD HH:mm:ss"></VueDatePicker>
                                        </div>
                                        <div class="form-group">
                                            <label>Pulang</label>
                                            <VueDatePicker time-picker-inline v-model="formData.out" :required="true" locale="id-ID" model-type="yyyy-MM-dd hh:mm:ss" position="left" format="yyyy-MM-dd hh:mm:ss" :auto-apply="true" placeholder="YYYY-MM-DD HH:mm:ss"></VueDatePicker>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" required v-model="formData.status">
                                                <option value="">Pilih status</option>
                                                <option value="0">Alpha</option>
                                                <option value="1">Masuk</option>
                                                <option value="2">Belum Pulang</option>
                                                <option value="3">Cuti</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import Layout from '../../Layout.vue';
import VueDatePicker from '@vuepic/vue-datepicker';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    attendance: {
        type: Object,
        required: false
    },
    employees: {
        type: Array,
        required: true
    }
})

const formData = ref({
    id: null,
    employee: null,
    employee_id: null,
    date: null,
    in: null,
    out: null,
    status: null
})

async function submitForm() {
    // cek apakah formnya adalah form edit atau create
    // kalau form edit, urlnya adalah attendance.edit
    // kalau form create, urlnya adalah attendance.create

    let url = ''
    try {
        let newData = {...formData.value}
        newData.salary = parseInt(String(newData.salary).replace(/\./g,''))
        // ketika edit
        if (props.jobPosition) {
            newData._method = 'PUT'
            url = route('attendance.update', {job_position: props.jobPosition.id})
            await axios.post(url, newData)
            router.replace(route('attendance.index'))
        }
        // ketika create
        else {
            url = route('attendance.store')
            const response = await axios.post(url, formData.value)
            // 1 redirect ke index
            router.replace(route('attendance.index'))
        }
    } catch (e) {
        alert(e.response?.data?.message || e.message || e || 'ada kesalahan')
    }
}

onMounted(() => {
    // artinya ini adalah form edit
    if (props.attendance) {
        formData.value = {...props.attendance}
    }

    $("#select-karyawan").select2()
    $("#select-karyawan").on('change.select2', function(e) {

    })
})
</script>
