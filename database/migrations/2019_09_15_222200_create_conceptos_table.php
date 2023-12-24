<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Contabilidad
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conceptos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_cx')->unique();
            $table->string('name', 64)->unique();
            $table->unsignedSmallInteger('table_account')->nullable(); // NO la estoy usando
            $table->unsignedSmallInteger('max_importance')->nullable(); // NO la entiendo del todo, es para dar prioridades
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conceptos');
    }
};
