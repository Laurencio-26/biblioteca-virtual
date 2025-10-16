<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('reportes', function (Blueprint $table) {
          $table->date('fecha_inicio')->nullable();
    $table->date('fecha_fin')->nullable();

    $table->json('parametros')->nullable(); 
        });
    }

    public function down(): void
    {
        Schema::table('reportes', function (Blueprint $table) {

        $table->dropColumn(['tipo', 'fecha_inicio', 'fecha_fin', 'parametros']);
            
        });
    }
};
