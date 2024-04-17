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
        Schema::create('mskt_research_methodology_zones', function (Blueprint $table) {
            $table->id('zone_id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id')->references('method_id')->on('mskt_research_methods');
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
