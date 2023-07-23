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
        Schema::create('employee_job_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_position_id')->constrained();
            $table->foreignId('employee_id')->constrained();
            $table->boolean('is_active');
            $table->date('start_date');
            $table->date('promotion_test_at');
            $table->date('end_date')->nullable();
            $table->timestamps();

            $table->unique(['job_position_id', 'employee_id', 'is_active'], 'employee_job_position_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_job_positions');
    }
};
