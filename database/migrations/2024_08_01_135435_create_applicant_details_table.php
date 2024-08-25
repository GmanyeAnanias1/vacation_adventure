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
            $table->string('registration_type');
            $table->string('course_name');

            // Fields for children registration
            $table->string('parents_name')->nullable();
            $table->string('wards_name')->nullable();
            $table->integer('ward_age')->nullable();
            $table->string('ward_school')->nullable();
            $table->string('location')->nullable();

            // Fields for student and adult registration
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            // Common fields
            $table->string('phone_number');
            $table->string('email');

            // Additional fields for student registration
            $table->string('school')->nullable();
            $table->string('program')->nullable();

            // Additional fields for adult registration
            $table->string('profession')->nullable();
            $table->string('industry')->nullable();

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