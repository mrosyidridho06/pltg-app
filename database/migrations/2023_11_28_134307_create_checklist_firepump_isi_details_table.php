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
        Schema::create('checklist_firepump_isi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklist_id')->constrained('checklist_fire_pumps')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('detail_id')->constrained('checklist_firepump_details')->onUpdate('cascade')->onDelete('restrict');
            $table->string('jockey_pump_normal')->nullable();
            $table->string('jockey_pump_rusak')->nullable();
            $table->string('fire_pump_normal')->nullable();
            $table->string('fire_pump_rusak')->nullable();
            $table->string('diesel_pump_normal')->nullable();
            $table->string('diesel_pump_rusak')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('checklist_firepump_isi_details');
    }
};
