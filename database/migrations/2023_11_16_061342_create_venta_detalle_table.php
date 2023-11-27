<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('venta_detalle', function (Blueprint $table) {
            $table->bigIncrements('DetalleVentaID');
            $table->date('Fecha');
            $table->text('Descripcion');
            $table->integer('Cantidad');
            $table->decimal('Precio', 10, 2);
            $table->unsignedBigInteger('EmpleadoID');
            $table->unsignedBigInteger('ProductoID');
            $table->timestamps();

            //$table->foreign('EmpleadoID')->references('EmpleadoID')->on('empleado')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('ProductoID')->references('ProductoID');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venta_detalle');
    }
};
