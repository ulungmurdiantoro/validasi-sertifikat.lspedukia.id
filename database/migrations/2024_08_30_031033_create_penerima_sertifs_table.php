<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penerima_sertifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('skema');
            $table->string('no_skema');
            $table->string('no_sertif');
            $table->string('nama_gelar');
            $table->string('tgl_rilis');
            $table->string('tgl_berakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_sertifs');
    }
};
