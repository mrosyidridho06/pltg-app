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
        Schema::create('penyulang_pembangkit_isi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyulang_pembangkit_id')->constrained('penyulang_pembangkits')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('detail_id')->constrained('penyulang_pembangkit_details')->onUpdate('cascade')->onDelete('restrict');
            $table->string('jam_22')->nullable();
            $table->string('jam_23')->nullable();
            $table->string('jam_00')->nullable();
            $table->string('jam_01')->nullable();
            $table->string('jam_02')->nullable();
            $table->string('jam_03')->nullable();
            $table->string('jam_04')->nullable();
            $table->string('jam_05')->nullable();
            $table->string('jam_06')->nullable();
            $table->string('jam_07')->nullable();
            $table->string('jam_08')->nullable();
            $table->string('jam_09')->nullable();
            $table->string('jam_10')->nullable();
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
        Schema::dropIfExists('penyulang_pembangkit_isi_details');
    }
};
