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
        Schema::table('venta_detalle', function (Blueprint $table) {
            $table->foreign('EmpleadoID')->references('EmpleadoID')->on('empleado');
            $table->foreign('ProductoID')->references('ProductoID')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venta_detalle', function (Blueprint $table) {
            $table->dropForeign(['EmpleadoID']);
            $table->dropForeign(['ProductoID']);
        });
    }
};
