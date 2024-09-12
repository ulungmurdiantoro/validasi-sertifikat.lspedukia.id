<template>
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary mb-4 shadow">
        <div class="container position-relative">
            <a class="navbar-brand me-lg-3" href="/">
                <img class="navbar-brand-dark" src="/assets/images/logo.png" style="height:70px">
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white" href="https://lspedukia.id/"><b>BERANDA</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white" href="https://lspedukia.id/"><b>TENTANG KAMI</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white" href="https://lspedukia.id/"><b>SKEMA SERTIFIKASI</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white" href="https://lspedukia.id/"><b>INFORMASI PUBLIK</b></a>
            </div>
            <!-- <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-secondary" href="/"><b>DAFTAR PEMEGANG SERTIFIKAT</b></a>
            </div> -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white" href="https://lspedukia.id/"><b>BLOG</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white" href="https://lspedukia.id/"><b>KONTAK KAMI</b></a>
            </div>
        </div>
    </nav>
    <div class="container">
        <slot />
    </div>
</template>

<script>

    //import Link
    import { Link } from '@inertiajs/vue3';

    export default {

        //register components
        components: {
            Link
        },

    }

</script>

<style>

</style>