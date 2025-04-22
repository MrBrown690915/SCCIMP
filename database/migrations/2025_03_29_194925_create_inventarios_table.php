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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();

            $table->string('codigo', 50);
            $table->string('nombre');
            $table->integer('stock')->default(0);
            $table->integer('stock_min')->default(10);
            $table->decimal('precio_venta',8,2)->default(0);
            $table->date('fecha');

            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')
                ->references('id')
                ->on('locals');

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
        Schema::dropIfExists('inventarios');
    }
};
