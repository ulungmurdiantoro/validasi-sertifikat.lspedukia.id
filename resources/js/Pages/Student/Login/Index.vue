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
                                <input
                                    type="text"
                                    class="form-control border-0 shadow"
                                    v-model="search"
                                    placeholder="masukkan kata kunci dan enter..."
                                    aria-label="Cari penerima sertifikat"
                                />
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
                                        <th class="border-0">Nomor Sertifikat</th>
                                        <th class="border-0">Certification Date</th>
                                        <th class="border-0 rounded-end">Status Sertifikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(penerimasertif, index) in penerimasertifs.data"
                                        :key="penerimasertif.id"
                                    >
                                        <td class="fw-bold text-center">
                                            {{ ++index + (penerimasertifs.current_page - 1) * penerimasertifs.per_page }}
                                        </td>
                                        <td>{{ penerimasertif.nama_lengkap }}</td>
                                        <td>{{ penerimasertif.skema }}</td>
                                        <td>{{ penerimasertif.no_sertif }}</td>
                                        <td>{{ penerimasertif.tgl_rilis }}</td>
                                        <td>
                                            {{
                                                new Date(penerimasertif.tgl_rilis) < new Date(penerimasertif.tgl_berakhir)
                                                    ? 'Aktif'
                                                    : 'Expired'
                                            }}
                                        </td>
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
import LayoutStudent from '../../../Layouts/Student.vue';
import Pagination from '../../../Components/Pagination.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { ref } from 'vue';

export default {
    layout: LayoutStudent,
    components: {
        Head,
        Link,
        Pagination,
    },
    props: {
        penerimasertifs: Object,
    },
    setup() {
        const search = ref((new URL(document.location)).searchParams.get('q') || '');

        const handleSearch = () => {
            router.get('/', {
                q: search.value,
            });
        };

        return {
            search,
            handleSearch,
        };
    },
};
</script>

<style scoped>
/* Add custom styles here if needed */
</style>
