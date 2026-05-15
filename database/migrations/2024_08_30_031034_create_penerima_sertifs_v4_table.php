<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penerima_sertifs_v4', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('skema');
            $table->integer('batch');
            $table->string('no_skema')->nullable();
            $table->string('no_sertif');
            $table->string('no_sk');
            $table->string('nama_gelar')->nullable();
            $table->date('tgl_rilis');
            $table->date('tgl_berakhir');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penerima_sertifs_v4');
    }
};
