<template>
    <Layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Jabatan</h1>
                        </div>
                        <div class="col-sm-6 text-right">

                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <!-- form start -->
                                <form method="post" @submit.prevent="submitForm">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Nama Jabatan" v-model="formData.title">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <input type="number" name="level" min="1" max="99" class="form-control" placeholder="Level Jabatan" v-model="formData.level">
                                        </div>
                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input id="input-salary" type="text" name="salary" class="form-control" placeholder="Gaji Pokok" v-model="formData.salary">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </Layout>
</template>

<script setup>
import AutoNumeric from 'autonumeric';
import axios from 'axios';
import Layout from '../../Layout.vue';
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    jobPosition: {
        type: Object,
        required: false
    }
})

const formData = ref({
    id: null,
    title: null,
    level: null,
    salary: null
})

async function submitForm() {
    // cek apakah formnya adalah form edit atau create
    // kalau form edit, urlnya adalah job-position.edit
    // kalau form create, urlnya adalah job-position.create

    let url = ''
    try {
        let newData = {...formData.value}
        newData.salary = parseInt(String(newData.salary).replace(/\./g,''))
        // ketika edit
        if (props.jobPosition) {
            newData._method = 'PUT'
            url = route('job-position.update', {job_position: props.jobPosition.id})
            await axios.post(url, newData)
            router.replace(route('job-position.index'))
        }
        // ketika create
        else {
            url = route('job-position.store')
            const response = await axios.post(url, formData.value)
            // 1 redirect ke index
            // router.replace(route('job-position.index'))
            // 2 redirect ke halaman edit/show
            router.replace(route('job-position.edit', {job_position: response.data.id}))
        }
    } catch (e) {
        alert(e.response?.data?.message || e.message || e || 'ada kesalahan')
    }
}

onMounted(() => {
    // artinya ini adalah form edit
    if (props.jobPosition) {
        formData.value = props.jobPosition
    }
    new AutoNumeric('#input-salary', {
        decimalPlaces: 0,
        digitGroupSeparator: '.',
        decimalCharacter: ','
    })
})
</script>
