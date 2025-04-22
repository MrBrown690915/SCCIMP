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
        Schema::create('operacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('operacion');
            $table->decimal('importe',8,2)->default(0);
            $table->integer('cantidad')->nullable();
            $table->integer('tiempo')->default(1);
            $table->decimal('total',8,2)->default(0);
            $table->date('fecha');

            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')
                ->references('id')
                ->on('locals');

            $table->unsignedBigInteger('tarifa_id');
            $table->foreign('tarifa_id')
                ->references('id')
                ->on('tarifas');

           
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operacions');
    }
};
