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
        Schema::create('detalle_inventarios', function (Blueprint $table) {
            $table->id();

            $table->integer('cantidad')->default(0);
            $table->unsignedBigInteger('inventario_id');
            $table->foreign('inventario_id')
                ->references('id')
                ->on('inventarios');

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')
                ->references('id')
                ->on('productos');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_inventarios');
    }
};
