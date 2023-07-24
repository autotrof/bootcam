<script setup>
import '@autotrof/av-datatable/dist/style.css'
import AvDatatable from '@autotrof/av-datatable'
import Layout from '../Layout.vue'
import { Head, Link } from '@inertiajs/vue3'

const table_options = {
	tableClassName: 'table table-hover table-striped',
	stateSave: true,
	fixedHeader: true,
	language: {
		lengthMenu: "Menampilkan _MENU_ data tiap halaman",
		infoEmpty: "Tidak ada data yang bisa ditampilkan",
		zeroRecords: "Data tidak ditemukan",
		search: "Cari:",
		info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
		infoFiltered: "(difilter dari _MAX_ total keseluruhan data)",
	}
}
const data = [
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "123456",
        name: "Agung",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Budi",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
    {
        nik: "84293842389",
        name: "Cahyo",
        job_position: {
            id: 1,
            name: "Staff"
        },
        phone: "082348283923",
        email: "emailkaryawan@gmail.com",
        birthdate: "2000-01-01"
    },
]
</script>

<template>
    <Layout>
        <Head>
            <title>Manajemen Karyawan</title>
        </Head>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manajemen Karyawan</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <Link href="/employee/create" class="btn btn-primary">Registrasi Karyawan</Link>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <AvDatatable class="table table-striped" :options="table_options" id="table-1">
                                    <template #header>
                                      <th>NIK</th>
                                      <th>Nama</th>
                                      <th>Jabatan</th>
                                      <th>Telp</th>
                                      <th>Email</th>
                                      <th>Usia</th>
                                    </template>
                                    <tr v-for="(d, index) in data" :key="index" @click="trClicked(index)">
                                        <td>{{ d.nik }}</td>
                                        <td>{{ d.name }}</td>
                                        <td>{{ d.job_position.name }}</td>
                                        <td>{{ d.phone }}</td>
                                        <td>{{ d.email }}</td>
                                        <td>{{ d.birthdate }}</td>
                                    </tr>
                                </AvDatatable>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style>
.datatable-wrapper .bottom-section .pagination input {
    padding: 3.5px !important;
}
</style>
