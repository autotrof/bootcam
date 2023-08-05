<template>
    <Layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manajemen Karyawan</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <Link :href="route('employee.create')" class="btn btn-primary">Karyawan Baru</Link>
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
                                <div class="card-body">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Telp</th>
                                                <th>Tgl Masuk</th>
                                                <th width="10"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="employee in props.employees" :key="employee.id">
                                                <td>
                                                    <img class="img" style="width:50px" :src="$asset_path + 'storage/' + employee.photo" />
                                                </td>
                                                <td>{{ employee.nik }}</td>
                                                <td>{{ employee.name }}</td>
                                                <td>{{ employee.phone }}</td>
                                                <td>{{ employee.entry_date }}</td>
                                                <td>
                                                    <Link :href="route('employee.edit', {employee: employee.id})" class="btn btn-sm btn-primary">
                                                        Edit
                                                    </Link>
                                                    <button class="btn btn-sm btn-danger" type="button" @click="deleteData(employee.id)">Hapus</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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
import { Link, router } from '@inertiajs/vue3';
import Layout from '../../Layout.vue';
import axios from 'axios';
import { nextTick, onMounted } from 'vue';

const props = defineProps({
    employees: {
        type: Array,
        required: true
    }
})

async function deleteData(id) {
    // const c = confirm("Are you sure you want to delete?")
    const c = await Sweetalert2.fire({
        title: 'Are you sure you want to delete?',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
    })
    if (c.value) {
        axios.post(route('employee.destroy', {employee: id}), {_method: 'DELETE'})
        router.reload()
    }
}

onMounted(() => {
    nextTick(() => {
        $("#table").DataTable()
    })
})
</script>
