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
        Schema::create('bsd_isidetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('black_start_diesels_id')->constrained('black_start_diesels')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('bsd_details_id')->constrained('bsd_details')->onUpdate('cascade')->onDelete('restrict');
            $table->string('siap_operasi')->nullable();
            $table->string('gangguan')->nullable();
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
        Schema::dropIfExists('b_s_d_isi_details');
    }
};
