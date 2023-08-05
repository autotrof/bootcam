<style>
@import '@vuepic/vue-datepicker/dist/main.css';
.trigger-input-foto {
    border: 1px solid lightgray;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 160px;
    cursor: pointer;
}
.trigger-input-foto:hover {
    border: 1px dotted lightgray;
    background-color: lightblue;
}
.input-file-hidden {
    opacity: 0;
    width: 0;
    height: 0;
    position: absolute;
}

.preview-image-wrapper {
    position: relative;
}
.preview-image-wrapper button {
    position: absolute;
    top: 10px;
    right: 10px;

}
</style>

<template>
    <Layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Form Karyawan</h1>
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
                                        <div class="row">
                                            <div class="col-sm-4 col-md-3 col-lg-2">
                                                <div class="trigger-input-foto" @click="pilihGambar" v-if="!imageSrc">
                                                    Pilih Foto
                                                </div>
                                                <div v-else class="preview-image-wrapper">
                                                    <img :src="imageSrc" alt="Gambar Profil" class="img img-thumbnail">
                                                    <button @click="pilihGambar" class="btn btn-sm btn-warning" type="button">Ganti</button>
                                                </div>
                                                <input ref="inputFoto" @change="gambarTerpilih" type="file" accept="images/*" class="input-file-hidden">
                                            </div>
                                            <div class="col-sm-8 col-md-9 col-lg-10">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                        <div class="form-group">
                                                            <label>NIK</label>
                                                            <input type="text" class="form-control" placeholder="NIK" required v-model="formData.nik">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" placeholder="Nama Karyawan" required v-model="formData.name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Telp</label>
                                                            <input type="text" class="form-control" placeholder="Nomor Telp Karyawan" required v-model="formData.phone">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Jabatan</label>
                                                            <select class="form-control" required v-model="formData.job_position_id">
                                                                <option value="">Pilih Jabatan</option>
                                                                <option v-for="position in props.jobPositions" :key="position.id" :value="position.id">{{ position.title }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Tgl Lahir</label>
                                                            <VueDatePicker v-model="formData.birth_date" :required="true" locale="id-ID" model-type="yyyy-MM-dd" position="left" format="yyyy-MM-dd" :auto-apply="true" placeholder="YYYY-MM-DD" start-date="1990-01-01"></VueDatePicker>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Tgl Masuk</label>
                                                            <VueDatePicker v-model="formData.entry_date" :required="true" locale="id-ID" model-type="yyyy-MM-dd" position="left" format="yyyy-MM-dd" :auto-apply="true" placeholder="YYYY-MM-DD"></VueDatePicker>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
import VueDatePicker from '@vuepic/vue-datepicker';
import axios from 'axios';
import Layout from '../../Layout.vue';
import { ref, onMounted, computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    employee: {
        type: Object,
        required: false
    },
    jobPositions: {
        type: Array,
        required: true
    }
})

const inputFoto = ref(null)
const fileFoto = ref(null)
const formData = ref({
    nik: null,
    name: null,
    birth_date: null,
    entry_date: null,
    phone: null,
    job_position_id: null,
    photo: null
})

function pilihGambar() {
    inputFoto.value.click()
}

function gambarTerpilih() {
    const [file] = inputFoto.value.files
    fileFoto.value = file
}

const imageSrc = computed(() => {
    if (fileFoto.value) {
        return URL.createObjectURL(fileFoto.value)
    } else if (formData.value.photo) {
        return $asset_path + 'storage/' + formData.value.photo
    }
    return null
})

async function submitForm() {
    // cek apakah formnya adalah form edit atau create
    // kalau form edit, urlnya adalah job-position.edit
    // kalau form create, urlnya adalah job-position.create

    let url = ''
    try {
        const data = new FormData()
        data.append('nik', formData.value.nik)
        data.append('name', formData.value.name)
        data.append('birth_date', formData.value.birth_date)
        data.append('entry_date', formData.value.entry_date)
        data.append('phone', formData.value.phone)
        data.append('job_position_id', formData.value.job_position_id)

        if (fileFoto.value) {
            data.append('photo_file', fileFoto.value)
        }
        // ketika edit
        if (props.employee) {
            data.append('_method', 'PUT')
            url = route('employee.update', {employee: props.employee.id})
            await axios.post(url, data, {headers: {'Content-Type': 'multipart/form-data'}})
            router.replace(route('employee.index'))
        }


        // ketika create
        else {
            url = route('employee.store')
            const response = await axios.post(url, data, {headers: {'Content-Type': 'multipart/form-data'}})
            // 1 redirect ke index
            // router.replace(route('job-position.index'))
            // 2 redirect ke halaman edit/show
            router.replace(route('employee.edit', {employee: response.data.id}))
        }
    } catch (e) {
        alert(e.response?.data?.message || e.message || e || 'ada kesalahan')
    }
}

onMounted(() => {
    // artinya ini adalah form edit
    if (props.employee) {
        formData.value = props.employee
    }
})
</script>
