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
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // BIGINT id
            $table->string('name'); // Car name (STRING)
            $table->string('brand'); // Car brand (STRING)
            $table->string('model'); // Car model (STRING)
            $table->integer('year'); // Year of manufacture (INTEGER)
            $table->string('car_type'); // Car type (STRING)
            $table->decimal('daily_rent_price', 8, 2); // Daily rent price (DECIMAL)
            $table->boolean('availability'); // Availability (BOOLEAN)
            $table->string('image'); // Car image path (STRING)
            $table->timestamps(); // created_at and updated_at (TIMESTAMP)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
