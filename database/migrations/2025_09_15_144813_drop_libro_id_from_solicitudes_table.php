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
        Schema::table('solicitudes', function (Blueprint $table) {

             if (Schema::hasColumn('solicitudes', 'libro_id')) {
                $table->dropForeign(['libro_id']);
                $table->dropColumn('libro_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitudes', function (Blueprint $table) {

          $table->unsignedBigInteger('libro_id')->nullable();
            $table->foreign('libro_id')->references('id')->on('libros');
        });
    }
};
