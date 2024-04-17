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
        Schema::create('mskt_posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('name')->nullable();
            $table->string('count')->nullable();
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('mskt_post_groups');
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id')->references('method_id')->on('mskt_research_methods');
            $table->string('doctors')->nullable();
            $table->string('need_qualification')->nullable();
            $table->string('shift_num')->nullable();
            
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
