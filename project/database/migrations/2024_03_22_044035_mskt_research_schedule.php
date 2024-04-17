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
        Schema::create('mskt_research_schedules', function (Blueprint $table) {
            $table->id('research_id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('mskt_employees');
            $table->unsignedBigInteger('method_id');
            $table->foreign('method_id')->references('method_id')->on('mskt_research_methods');
            $table->unsignedBigInteger('cabinet_id');
            $table->foreign('cabinet_id')->references('id')->on('mskt_cabinets');
            $table->unsignedBigInteger('methodology_id');
            $table->foreign('methodology_id')->references('methodology_id')->on('mskt_research_methodologys');
            $table->unsignedBigInteger('pacient_id');
            $table->foreign('pacient_id')->references('pacient_id')->on('mskt_pacients');
            $table->date('date')->nullable();;
            $table->string('time_start')->nullable();
            $table->string('time_end')->nullable();
            $table->string('price')->nullable();
            $table->string('pay');
            $table->string('done_status');
            $table->string('cancel_user')->nullable();;
            $table->string('cancel_time')->nullable();
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
