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
        Schema::create('check_list_start_mesin_isi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklist_id')->constrained('checklist_start_mesins')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('detail_id')->constrained('check_list_start_mesin_details')->onUpdate('cascade')->onDelete('restrict');
            $table->string('ok')->nullable();
            $table->string('not_ok')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('check_list_start_mesin_isi_details');
    }
};
