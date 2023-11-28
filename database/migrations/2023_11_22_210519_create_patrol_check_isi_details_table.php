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
        Schema::create('patrol_check_isi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patrol_check_id')->constrained('patrol_checks')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('patrol_check_detail_id')->constrained('patrol_check_details')->onUpdate('cascade')->onDelete('restrict');
            $table->string('jam_9')->nullable();
            $table->string('jam_14')->nullable();
            $table->string('jam_16')->nullable();
            $table->string('jam_21')->nullable();
            $table->string('jam_00')->nullable();
            $table->string('jam_06')->nullable();
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
        Schema::dropIfExists('patrol_check_isi_details');
    }
};
