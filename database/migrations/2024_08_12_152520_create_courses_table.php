<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); 
            $table->string('trans_id');
            $table->string('course_code');
            $table->string('course_name');
            $table->boolean('deleted');
            $table->string('createuser');
            $table->timestamp('createdate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('modifyuser');
            $table->timestamp('modifydate')->nullable(); 
            $table->timestamps(); 
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};