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
        Schema::create('provehedors', function (Blueprint $table) {
            $table->id();

            $table->string('empresa');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');
            $table->string('nombre');
            $table->string('movil');
            $table->unsignedBigInteger('empresa_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provehedors');
    }
};
