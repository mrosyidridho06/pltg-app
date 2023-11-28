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
        Schema::create('penyulang_pembangkit_details', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_dokumen')->unique();
            $table->string('slug');
            $table->date('tanggal_terbit');
            $table->string('revisi')->nullable();
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
        Schema::dropIfExists('penyulang_pembangkit_details');
    }
};
