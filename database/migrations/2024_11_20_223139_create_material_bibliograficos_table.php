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
        Schema::create('material_bibliograficos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->unique();
            $table->foreignId('estado_id')->constrained('estado_materials')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categoria_materials')->onDelete('cascade');
            $table->foreignId('tipo_id')->constrained('tipo_materials')->onDelete('cascade');
            $table->string('titulo', 255);
            $table->string('editorial', 100);
            $table->string('autor', 100);
            $table->date('fecha_publicacion')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_bibliograficos');
    }
};
