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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->foreignId('aventure_id')
                ->nullable()
                ->constrained('aventures')
                ->unique()
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreignId('continent_id')
                ->nullable()
                ->constrained('continents')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
