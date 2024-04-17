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
        Schema::create('mskt_cabinet_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabinet_id');
            $table->foreign('cabinet_id')->references('id')->on('mskt_cabinets');
            $table->date('date')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mskt_cabinet_schedules');
    }
};
