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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); 
            $table->string('img')->nullable(); // Allow null if no image
            $table->decimal('price', 8, 2); // Decimal for price with precision
            $table->string('slug'); // Make slug unique for SEO-friendly URLs
            $table->unsignedBigInteger('author_id'); // Foreign key to writers table
            $table->unsignedBigInteger('publisher_id'); // Foreign key to publishers table
            $table->enum('status', ['available', 'issued'])->default('available');
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
