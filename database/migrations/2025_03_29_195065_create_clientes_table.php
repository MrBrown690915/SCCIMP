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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->string('ci', length:11)->unique();
            $table->string('nombre');
            $table->string('email')->unique()->nullable();
            $table->string('telef')->nullable();
            $table->string('direc')->nullable();
            $table->string('contrato')->nullable();
            $table->boolean('activo')->default(true);

            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
