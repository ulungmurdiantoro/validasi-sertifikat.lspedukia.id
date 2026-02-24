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
                                        {{ getSertifStatus(penerimasertif.tgl_berakhir) }}
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
  components: { Head, Link, Pagination },
  props: { penerimasertifs: Object },

  setup() {
    const search = ref(new URL(document.location).searchParams.get('q') || '');

    const handleSearch = () => {
      router.get('/', { q: search.value });
    };

    // Parse aman untuk string tanggal dari DB (varchar)
    // Support: "YYYY-MM-DD", "DD-MM-YYYY", "YYYY/MM/DD", "DD/MM/YYYY"
    const parseDateEndOfDay = (raw) => {
      if (!raw || typeof raw !== 'string') return null;

      const s = raw.trim();
      const parts = s.includes('-') ? s.split('-') : (s.includes('/') ? s.split('/') : null);
      if (!parts || parts.length < 3) return null;

      let y, m, d;

      // detect format
      // if first chunk is 4 digits => YYYY-MM-DD
      if (parts[0].length === 4) {
        y = parts[0];
        m = parts[1];
        d = parts[2];
      } else {
        // assume DD-MM-YYYY
        d = parts[0];
        m = parts[1];
        y = parts[2];
      }

      // Normalisasi ke akhir hari lokal supaya masih "Aktif" sepanjang tanggal berakhir
      const dt = new Date(`${y}-${m}-${d}T23:59:59`);
      return Number.isNaN(dt.getTime()) ? null : dt;
    };

    const getSertifStatus = (tgl_berakhir) => {
      const expiredAt = parseDateEndOfDay(tgl_berakhir);
      if (!expiredAt) return '-'; // atau 'Tanggal tidak valid'

      return expiredAt >= new Date() ? 'Aktif' : 'Expired';
    };

    return {
      search,
      handleSearch,
      getSertifStatus,
    };
  },
};
</script>