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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('employee_id')->constrained();
            $table->dateTime('in')->nullable();
            $table->dateTime('out')->nullable();
            $table->tinyInteger('status')->comment('1=present, 0=absent, 2=sick, 3=paid leave');
            $table->decimal('salary_cut')->default(0);
            $table->timestamps();

            $table->unique(['date', 'employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
