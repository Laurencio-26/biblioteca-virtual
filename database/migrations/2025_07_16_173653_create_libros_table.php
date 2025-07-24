<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_libro')->unique();
            $table->string('titulo');
            $table->string('autor');
            $table->string('nivel')->nullable();
            $table->string('area')->nullable();
            $table->string('editorial')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('estado')->default('Disponible');
            $table->text('observaciones')->nullable();
            $table->integer('cantidad')->default(1);
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->string('archivo_pdf')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
