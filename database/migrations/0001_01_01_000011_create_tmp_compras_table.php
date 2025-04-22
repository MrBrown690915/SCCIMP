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
        Schema::create('tmp_compras', function (Blueprint $table) {
            $table->id();

            $table->integer('cantidad')->default(0);

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')
                ->references('id')
                ->on('productos');
            
            $table->string('session_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tmp_compras');
    }
};
