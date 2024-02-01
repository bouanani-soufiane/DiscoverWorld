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
        Schema::disableForeignKeyConstraints();
        Schema::create('continents', function (Blueprint $table) {
            $table->id();
            $table->string('nameContinent');
            $table->string('description');
            $table->foreignId('image_id')
                ->nullable()
                ->constrained('images')
                ->unique()
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('continents');
    }
};
