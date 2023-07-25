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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('name');
            $table->date('birthdate');
            $table->text('address');
            $table->string('photo')->nullable();
            $table->string('phone', 15);
            $table->string('email', 100)->nullable();
            $table->timestamps();

            $table->index(['nik', 'name', 'phone', 'email'], 'employee_search_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
