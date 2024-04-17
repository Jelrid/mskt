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
        Schema::create('mskt_employee_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('shift')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('mskt_employees');

            $table->unsignedBigInteger('cabinet_schedule_id');
            $table->foreign('cabinet_schedule_id')->references('id')->on('mskt_cabinet_schedules');

            $table->string('time_start')->nullable();
            $table->string('time_end')->nullable();
            $table->string('remote')->nullable();
            $table->string('can_get_pay')->nullable();
            $table->string('methodology_id')->nullable();
            $table->string('check_employee_id')->nullable();
            $table->string('post_id')->nullable();
            $table->string('timed_replace')->nullable();
            $table->string('timed_replace_employee_id')->nullable();
            $table->string('time_stimed_replace_timetart')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mskt_employee_schedules');
    }
};
