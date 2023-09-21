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
        Schema::create('jam_logsheets', function (Blueprint $table) {
            $table->id();
            $table->time('jam');
            $table->foreignId('logsheet_id')->constrained('logsheets')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('parameter_id')->constrained('parameter_logsheets')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('detail_parameter_id')->constrained('detail_parameter_logsheets')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('jam_logsheets');
    }
};
