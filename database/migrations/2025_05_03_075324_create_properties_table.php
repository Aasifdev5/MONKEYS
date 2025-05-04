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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('thumbnail');
            $table->decimal('price', 10, 2);
            $table->decimal('rating', 3, 2)->default(0);
            $table->boolean('favorite')->default(false);
            $table->integer('max_people');
            $table->json('bedrooms')->nullable();
            $table->json('amenities')->nullable();
            $table->json('property_images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
