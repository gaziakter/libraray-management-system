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
            $table->string('student_name'); // First name of student
            $table->string('father_name'); // Father’s name
            $table->string('phone')->nullable(); // Phone number (optional)
            $table->text('address')->nullable(); // Address (optional)
            $table->string('email')->unique(); // Unique email address
            $table->date('date_of_birth'); // Date of birth
            $table->enum('gender', ['male', 'female', 'other']); // Gender field
            $table->string('image')->nullable(); // Path to profile image
            $table->unsignedBigInteger('blood_id'); // Foreign key to blood_groups table
            $table->string('education_qualification')->nullable(); // Education qualification
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('blood_id')->references('id')->on('blood_groups')
                  ->onDelete('cascade'); // Cascade delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students'); // Drop the table if rollback
    }
};
