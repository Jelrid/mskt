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
        Schema::create('mskt_cabinets', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('filial_id');
        $table->foreign('filial_id')->references('id')->on('mskt_filials');
        $table->integer('number');
        $table->string('name');
        $table->string('name_shorts');
        $table->string('floor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mskt_cabinets');
    }
};
