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
        Schema::create('aventures', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('aventureDescription');
            $table->text('consiel');
            $table->foreignId('user_id')
                ->constrained('users')
                ->unique()
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreignId('continent_id')
                ->constrained('continents')
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
        Schema::dropIfExists('aventures');
    }
};
