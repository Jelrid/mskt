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
        Schema::create('mskt_research_methodologys', function (Blueprint $table) {
            $table->id('methodology_id');
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id')->references('method_id')->on('mskt_research_methods');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('zone_id')->on('mskt_research_methodology_zones');
            $table->string('name')->nullable();
            $table->string('short');
            $table->string('check_name');
            $table->string('time');
            $table->string('price')->nullable();;
            $table->string('contrast')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
