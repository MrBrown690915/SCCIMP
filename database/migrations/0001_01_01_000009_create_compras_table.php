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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('comprobante');
            $table->decimal('precio_total',8,2)->default(0);

            $table->unsignedBigInteger('provehedor_id');
            $table->foreign('provehedor_id')
                        ->references('id')
                        ->on('provehedors');

            $table->unsignedBigInteger('empresa_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
