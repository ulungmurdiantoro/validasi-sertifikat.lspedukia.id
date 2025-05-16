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
                    <td>{{ penerimask.tgl_rilis }}</td>
                  </tr>
                  <tr>
                    <th>Proses  Pelaksanaan</th>
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
                    <td><b>Ketua LSP</b></td>
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
};
</script>

<style scoped>
/* Container fade-in animation */
.container-fluid {
  animation: fadeIn 0.5s ease-in-out;
}

/* Fade transition for view */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Card styling with increased width */
.certificate-card {
  max-width: 90%; /* Increased from 600px to 800px */
  margin: 0 auto;
  border: none;
  border-radius: 10px;
  overflow: hidden;
}

/* Card Header styling */
.certificate-card .card-header {
  background-color: #007bff;
  padding: 1rem;
}

/* Card Body styling */
.certificate-card .card-body {
  padding: 2rem;
  background-color: #f8f9fa;
}

/* Error state styling with shake animation */
.error-state {
  max-width: 800px; /* Matching the container width */
  margin: 20px auto;
  animation: shake 0.5s;
}

/* Fade-in keyframe animation */
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

/* Shake keyframe animation for error state */
@keyframes shake {
  0% { transform: translateX(0); }
  25% { transform: translateX(-10px); }
  50% { transform: translateX(10px); }
  75% { transform: translateX(-10px); }
  100% { transform: translateX(0); }
}
</style>
