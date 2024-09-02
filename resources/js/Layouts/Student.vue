<template>
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-dark navbar-theme-primary mb-4 shadow">
        <div class="container position-relative">
            <a class="navbar-brand me-lg-3" href="/">
                <img class="navbar-brand-dark" src="/assets/images/logo.png" style="height:70px">
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white-bold" href="https://lspedukia.id/">EDUKIA</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white-bold" href="https://lspedukia.id/">TENTANG KAMI</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white-bold" href="https://lspedukia.id/">SERTIFIKASI</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-secondary-bold" href="/">VALIDASI SERTIFIKAT</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white-bold" href="https://lspedukia.id/">BERITA</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                    <a class="text-white-bold" href="https://lspedukia.id/">KONTAK KAMI</a>
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