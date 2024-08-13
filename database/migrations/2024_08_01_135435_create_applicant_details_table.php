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
        Schema::create('applicant_details', function (Blueprint $table) {
            $table->id();
            $table->string('parents_name');
            $table->string('wards_name');
            $table->integer('ward_age');
            $table->string('ward_school');
            $table->string('location');
            $table->string('course_name');
            $table->string('phone_number');
            $table->string('email');
            $table->date('start_date')->default('2024-08-13');
            $table->date('end_date')->default('2024-08-30');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_details');
    }
};