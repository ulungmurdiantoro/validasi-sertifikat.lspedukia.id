<template>
  <Head>
    <title>Detail Sertifikat</title>
  </Head>
  <div class="container-fluid">
    <transition name="fade" mode="out-in">
      <template v-if="!penerimask">
        <div class="error-state alert alert-danger text-center" role="alert">
          Maaf, data sertifikat tidak ditemukan.
        </div>
      </template>

      <template v-else>
        <div class="certificate-card card shadow-sm mx-auto">
          <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">VALIDASI DOKUMEN ELEKTRONIK</h3>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <th>Jenis Dokumen</th>
                    <td>SURAT KEPUTUSAN (SK).</td>
                  </tr>
                  <tr>
                    <th>No Dokumen</th>
                    <td><b>{{ penerimask.no_sk }}</b></td>
                  </tr>
                  <tr>
                    <th>Tanggal Dokumen</th>
                    <!-- ✅ diubah jadi format Indonesia -->
                    <td>{{ formatTanggalIndo(penerimask.tgl_rilis) }}</td>
                  </tr>
                  <tr>
                    <th>Proses Pelaksanaan</th>
                    <td>{{ penerimask.skema }} Batch {{ penerimask.batch }}</td>
                  </tr>
                  <tr>
                    <th>Nama Penanggung Jawab</th>
                    <td>Agung Yulianto, M.Si</td>
                  </tr>
                  <tr>
                    <th>Instansi</th>
                    <td>LSP Edukasi Global Cendekia</td>
                  </tr>
                  <tr>
                    <th>Jabatan</th>
                    <td><b>Ketua LSP</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </template>
    </transition>
  </div>
</template>

<script>
import LayoutStudent from '../../../Layouts/Auth.vue';
import { Head } from '@inertiajs/vue3';

export default {
  layout: LayoutStudent,
  components: { Head },
  props: {
    penerimask: {
      type: Object,
      required: false,
      default: null,
    },
  },
  methods: {
    // ✅ format tanggal Indonesia: "3 Maret 2026"
    formatTanggalIndo(raw) {
      if (!raw) return '-';

      // kalau raw sudah "YYYY-MM-DD" atau "YYYY-MM-DD HH:mm:ss"
      // ambil 10 karakter pertama biar aman
      const s = String(raw).trim().slice(0, 10);

      // bikin Date yang aman (hindari shift timezone)
      // contoh s = "2026-03-03"
      const [y, m, d] = s.split('-');
      if (!y || !m || !d) return raw;

      const dt = new Date(Number(y), Number(m) - 1, Number(d));
      if (Number.isNaN(dt.getTime())) return raw;

      return dt.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
      });
    },
  },
};
</script>

<style scoped>
.container-fluid {
  animation: fadeIn 0.5s ease-in-out;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.certificate-card {
  max-width: 90%;
  margin: 0 auto;
  border: none;
  border-radius: 10px;
  overflow: hidden;
}

.certificate-card .card-header {
  background-color: #007bff;
  padding: 1rem;
}

.certificate-card .card-body {
  padding: 2rem;
  background-color: #f8f9fa;
}

.error-state {
  max-width: 800px;
  margin: 20px auto;
  animation: shake 0.5s;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes shake {
  0% { transform: translateX(0); }
  25% { transform: translateX(-10px); }
  50% { transform: translateX(10px); }
  75% { transform: translateX(-10px); }
  100% { transform: translateX(0); }
}
</style>