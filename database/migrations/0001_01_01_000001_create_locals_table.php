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
        Schema::create('locals', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('direccion')->nullable();
            $table->string('cp');
            $table->string('telef')->nullable();
            $table->string('email')->unique();
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
        Schema::dropIfExists('locals');
    }
};
