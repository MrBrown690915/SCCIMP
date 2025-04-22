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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->decimal('precio_total',8,2)->default(0);

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')
                    ->references('id')
                    ->on('clientes');

            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')
                    ->references('id')
                    ->on('locals');
            
            $table->unsignedBigInteger('empresa_id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
