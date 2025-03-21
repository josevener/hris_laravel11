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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('meal_allowance', 10, 2)->nullable();
            $table->decimal('transpo_allowance', 10, 2)->nullable();
            $table->decimal('sss', 10, 2)->nullable();
            $table->decimal('philhealth', 10, 2)->nullable();
            $table->decimal('pag_ibig', 10, 2)->nullable();
            $table->decimal('net_salary', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
