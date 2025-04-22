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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();

            $table->integer('cantidad')->default(0);
            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')
                ->references('id')
                ->on('ventas');

            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id')
                ->references('id')
                ->on('inventarios');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
