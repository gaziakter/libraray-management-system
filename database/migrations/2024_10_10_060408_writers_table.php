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
        Schema::create('writers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Writer name
            $table->string('photo')->nullable(); // Photo URL or file path, allow null
            $table->string('address')->nullable(); // Optional address, allow null
            $table->string('mobile', 15)->unique(); // Mobile number with a unique constraint, max 15 chars
            $table->string('email')->unique(); // Ensure email is unique
            $table->string('website')->nullable(); // Optional website URL
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('writers');
    }
};
