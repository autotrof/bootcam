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
                            <Link :href="route('employee.create')" class="btn btn-primary mr-2">Karyawan Baru</Link>
                            <a target="_blank" :href="route('employee.export', filter)" class="btn btn-success">Export Data</a>
                        </div>
                    </div>
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
                                    <div class="row mb-4">
                                        <div class="col-sm-4 col-md-3">
                                            <label>Jabatan</label>
                                            <select @change="filterData" class="form-control" id="filter-jabatan">
                                                <option value="">Semua Jabatan</option>
                                                <option v-for="position in props.jobPositions" :value="position.id">{{ position.title }}</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 col-md-3">
                                            <label>Tgl Masuk</label>
                                            <VueDatePicker :month-change-on-scroll="false" @update:model-value="filterData" range multi-calendars v-model="filter.entry_date" :required="true" locale="id-ID" model-type="yyyy-MM-dd" position="left" format="yyyy-MM-dd" placeholder="YYYY-MM-DD"></VueDatePicker>
                                        </div>
                                    </div>
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>Foto</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Telp</th>
                                                <th>Tgl Masuk</th>
                                                <th>Jabatan</th>
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
import VueDatePicker from '@vuepic/vue-datepicker'

const props = defineProps({
    jobPositions: {
        type: Array,
        required: true
    }
})

const table = ref(null)
const filter = ref({
    job_position_id: null,
    entry_date: [null, null],
})

function filterData() {
    nextTick(() => {
        table.value.ajax.reload(null, false)
    })
}

async function deleteData(id) {
    // const c = confirm("Are you sure you want to delete?")
    const c = await Sweetalert2.fire({
        title: 'Are you sure you want to delete?',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
    })
    if (c.value) {
        await axios.post(route('employee.destroy', {employee: id}), {_method: 'DELETE'})
        // router.reload()
        table.value.ajax.reload(null, true)
    }
}

onMounted(() => {
    nextTick(() => {
        table.value = $("#table").DataTable({
            serverSide: true,
            ajax: {
                url: route('employee.data'),
                method: 'POST',
                data: function (data){
                    data._token = router.page.props.csrf_token
                    data.job_position_id = filter.value.job_position_id
                    data.entry_date = filter.value.entry_date
                }
            },
            processing: true,
            columns: [
                {
                    data: 'photo',
                    render: function(data, type, row, meta) {
                        return `<img class="img" style="width:50px" src="${$asset_path}storage/${row.photo}" />`
                    }
                },
                {
                    data: 'nik',
                },
                {
                    data: 'name',
                },
                {
                    data: 'phone',
                },
                {
                    data: 'entry_date',
                },
                {
                    data: 'title',
                },
                {
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `
                            <a href="${route('employee.edit', {employee: row.id})}" class="link-detail btn btn-sm btn-primary">
                                Edit
                            </a>
                            <button data-id="${row.id}" class="btn btn-sm btn-danger btn-hapus" type="button">Hapus</button>
                        `
                    }
                }
            ],
            drawCallback: function( settings ) {
                $(".link-detail").on( 'click', function (e) {
                    e.preventDefault()
                    router.get(e.target.href)
                });

                $(".btn-hapus").on( 'click', function (e) {
                    e.preventDefault()
                    deleteData(e.target.dataset.id)
                });
            }
        })

        $("#filter-jabatan").select2()
        $("#filter-jabatan").on('change.select2', function (e) {
            filter.value.job_position_id = $("#filter-jabatan").val()
            filterData()
        })
    })

})
</script>
