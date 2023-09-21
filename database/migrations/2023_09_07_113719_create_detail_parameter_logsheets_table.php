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
        Schema::create('detail_parameter_logsheets', function (Blueprint $table) {
            $table->id();
            $table->string('detail_parameter');
            $table->string('alarm')->nullable();
            $table->string('satuan')->nullable();
            $table->foreignId('parameter_logsheet_id')->constrained('parameter_logsheets')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('detail_parameter_logsheets');
    }
};
