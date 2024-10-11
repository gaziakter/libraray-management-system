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
            $table->string('name');
            $table->string('img')->nullable(); // Allow null if no image
            $table->decimal('price', 8, 2); // Decimal for price with precision
            $table->string('slug')->unique(); // Make slug unique for SEO-friendly URLs
            $table->unsignedBigInteger('writer_id'); // Foreign key to writers table
            $table->unsignedBigInteger('publisher_id'); // Foreign key to publishers table
            $table->unsignedBigInteger('category_id'); // Foreign key to categories table
            $table->unsignedBigInteger('sub_category_id')->nullable(); // Foreign key to subcategories table, nullable if not mandatory
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('writer_id')->references('id')->on('writers')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
