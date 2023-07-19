<script setup>
    import Layout from '../Layout.vue'
    import { Head } from '@inertiajs/vue3'
    defineProps(['nama', 'kelas'])
</script>

<template>
  <Layout>
    <Head title="Welcome" />
    <h1>Halo {{ nama }}</h1>
  </Layout>
</template>
