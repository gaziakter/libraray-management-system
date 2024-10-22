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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('student_name')->unique(); // First name of student
            $table->string('father_name'); // Father’s name
            $table->string('phone'); // Phone number 
            $table->text('address'); // Address 
            $table->string('email')->unique(); // Unique email address
            $table->date('date_of_birth'); // Date of birth
            $table->enum('gender', ['male', 'female', 'other']); // Gender field
            $table->string('photo')->nullable(); // Path to profile image
            $table->string('slug'); // Path to profile image
            $table->unsignedBigInteger('blood_id')->nullable(); // Foreign key to blood_groups table
            $table->string('education_qualification')->nullable(); // Education qualification
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('blood_id')->references('id')->on('bloods')
                  ->onDelete('cascade'); // Cascade delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
