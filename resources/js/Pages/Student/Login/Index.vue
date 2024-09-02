<template>
    <Head>
        <title>Daftar Penerima Sertifikat</title>
    </Head>
    <div class="container-fluid mb-5 mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-8 col-12 mb-2">
                        <form @submit.prevent="handleSearch">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 shadow" v-model="search" placeholder="masukkan kata kunci dan enter...">
                                <span class="input-group-text border-0 shadow">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr class="border-0">
                                        <th class="border-0 rounded-start" style="width:5%">No.</th>
                                        <th class="border-0">Nama Lengkap</th>
                                        <th class="border-0">Skema Sertifikasi</th>
                                        <!-- <th class="border-0">Nomor Skema</th> -->
                                        <th class="border-0">Nomor Sertifikat</th>
                                        <!-- <th class="border-0">Nama Gelar</th> -->
                                        <th class="border-0">Certification Date</th>
                                        <th class="border-0 rounded-end">Status Sertifikat</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(penerimasertif, index) in penerimasertifs.data" :key="index">
                                        
                                        <td class="fw-bold text-center">{{ ++index + (penerimasertifs.current_page - 1) * penerimasertifs.per_page }}</td>
                                        <td>{{ penerimasertif.nama_lengkap }}</td>
                                        <td>{{ penerimasertif.skema }}</td>
                                        <!-- <td>{{ penerimasertif.no_skema }}</td> -->
                                        <td>{{ penerimasertif.no_sertif }}</td>
                                        <!-- <td>{{ penerimasertif.nama_gelar }}</td> -->
                                        <td>{{ penerimasertif.tgl_rilis }}</td>
                                        <td v-if="penerimasertif.tgl_rilis < penerimasertif.tgl_berakhir">Aktif</td>
                                        <td v-else>Expired</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="penerimasertifs.links" align="end" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //import layout
    import LayoutStudent from '../../../Layouts/Student.vue';

    //import component pagination
    import Pagination from '../../../Components/Pagination.vue';

    //import Heade and Link from Inertia
    import {
        Head,
        Link,
        router
    } from '@inertiajs/vue3';

    //import ref from vue
    import {
        ref
    } from 'vue';

    export default {
        //layout
        layout: LayoutStudent,

        //register component
        components: {
            Head,
            Link,
            Pagination
        },

        //props
        props: {
            penerimasertifs: Object,
        },

        //inisialisasi composition API
        setup() {

            //define state search
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            //define method search
            const handleSearch = () => {
                router.get('/', {

                    //send params "q" with value from state "search"
                    q: search.value,
                });
            }

            //return
            return {
                search,
                handleSearch,
            }

        }
    }

</script>


<style>

</style>