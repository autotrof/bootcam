<template>
    <Layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Daftar Kehadiran</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <Link :href="route('attendance.create')" class="btn btn-primary">Input Kehadiran</Link>
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
                                                <th>Karyawan</th>
                                                <th>Tanggal</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Status</th>
                                                <th width="10"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

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
import { nextTick, onMounted, ref } from 'vue';

function deleteData(id) {
    const c = confirm("Are you sure you want to delete?")
    if (c == true) {
        axios.post(route('attendance.destroy', {attendance: id}), {_method: 'DELETE'})
        router.reload()
    }
}

const tableGrid = ref(null)

onMounted(() => {
    nextTick(() => {
        tableGrid.value = $("#table").DataTable({
            serverSide: true,
            ajax: {
                url: route('attendance.data'),
                method: 'POST',
                data: function (data){
                    data._token = router.page.props.csrf_token
                }
            },
            processing: true,
            columns: [
                {
                    data: 'name',
                },
                {
                    data: 'date',
                },
                {
                    data: 'in',
                },
                {
                    data: 'out',
                },
                {
                    data: 'status',
                    render: function(data, type, row, meta) {
                        switch (parseInt(row.status)) {
                            case 0:
                                return 'Alpha';
                            case 1:
                                return 'Masuk';
                            case 2:
                                return 'Belum Pulang';
                            case 3:
                                return 'Cuti';
                        }
                    }
                },
                {
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `
                            <a href="${route('attendance.edit', {attendance: row.id})}" class="link-detail btn btn-sm btn-primary">
                                Edit
                            </a>
                            <button data-id="${row.id}" class="btn btn-sm btn-danger btn-hapus" type="button">Hapus</button>
                        `
                    }
                }
            ],
            drawCallback: function( settings ) {
                $(".link-detail").on( 'click', function (e) {
                    e.preventDefault();
                    router.get(e.target.href)
                });

                $(".btn-hapus").on( 'click', function (e) {
                    e.preventDefault();
                    console.log(e)
                    deleteData(e.target.dataset.id)
                });
            }
        })
    })
})
</script>
