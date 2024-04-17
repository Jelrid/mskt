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
        Schema::create('mskt_employee_posts', function (Blueprint $table) {
            $table->id('employee_id');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('post_id')->on('mskt_posts');
            $table->string('hours')->nullable();
            $table->string('first_price')->nullable();
            $table->string('second_price')->nullable();
            $table->string('time')->nullable();
            
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
