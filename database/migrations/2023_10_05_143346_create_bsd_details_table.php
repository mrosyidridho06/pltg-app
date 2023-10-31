<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsd_details', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_dokumen')->unique();
            $table->string('slug');
            $table->date('tanggal_terbit');
            $table->string('revisi')->nullable();
            $table->string('siap_operasi')->nullable();
            $table->string('gangguan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('rh_sebelum')->nullable();
            $table->string('rh_setelah')->nullable();
            $table->string('flowmeter_bbm')->nullable();
            $table->string('catatan')->nullable();
            $table->string('pelaksana_tes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bsd_details');
    }
};
