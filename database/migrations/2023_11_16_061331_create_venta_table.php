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
        Schema::create('venta', function (Blueprint $table) {
            $table->id('VentaID');
            $table->date('Fecha');
            $table->decimal('Total', 10, 2);
            $table->string('imagen');
            //$table->unsignedBigInteger('EmpleadoID'); // Clave foránea para la tabla Empleado
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
