<template>
    <Head>
        <title>Detail Sertifikat</title>
    </Head>
    <div class="container-fluid mb-5 mt-5">
        <h2>{{ penerimasertif.nama_lengkap }}</h2>
        <p>Nomor Sertifikat: {{ penerimasertif.no_sertif }}</p>
        <p>Skema Sertifikasi: {{ penerimasertif.skema }}</p>
        <p>Tanggal Rilis: {{ penerimasertif.tgl_rilis }}</p>
        <p v-if="penerimasertif.tgl_rilis < penerimasertif.tgl_berakhir">Status: Aktif</p>
        <p v-else>Status: Expired</p>
    </div>
</template>

<script>
    import LayoutStudent from '../../../Layouts/Student.vue';
    import { Head } from '@inertiajs/vue3';

    export default {
        layout: LayoutStudent,
        components: { Head },
        props: { penerimasertif: Object },
    };
</script>

<style>
/* Add your custom styles here */
</style>
