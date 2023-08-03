<template>
    <Layout>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manajemen Jabatan</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <Link :href="route('job-position.create')" class="btn btn-primary">Jabatan Baru</Link>
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
                                                <th>Title</th>
                                                <th>Level</th>
                                                <th>Salary</th>
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
import { nextTick, onMounted } from 'vue';

const props = defineProps({

})

function deleteData(id) {
    const c = confirm("Are you sure you want to delete?")
    if (c == true) {
        axios.post(route('job-position.destroy', {job_position: id}), {_method: 'DELETE'})
        router.reload()
    }
}

onMounted(() => {
    nextTick(() => {
        $("#table").DataTable()
    })
})
</script>
