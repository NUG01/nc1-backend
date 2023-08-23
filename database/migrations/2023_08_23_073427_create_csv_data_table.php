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
        Schema::create('csv_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('price');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('storeys');
            $table->integer('garages');
            $table->timestamps();

            $table->index(['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csv_data');
    }
};
