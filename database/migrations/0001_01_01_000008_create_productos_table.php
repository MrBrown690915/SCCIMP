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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            
            $table->string('codigo', 50)->unique()->nullable();
            $table->string('nombre');
            $table->string('medida');
            $table->integer('stock')->default(0);
            $table->integer('stock_paq')->nullable(); // unidades por paquete, se llena cuando la UM es un paquete
            $table->integer('stock_min')->default(10);
            $table->integer('stock_max')->default(100);
            $table->decimal('precio_compra',8,2)->default(0);
            $table->decimal('precio_venta',8,2)->default(0);
            $table->boolean('activo')->default(true);
            $table->date('fecha');

            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas');

            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
