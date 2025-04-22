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
        Schema::create('arqueos', function (Blueprint $table) {
            $table->id();

            $table->dateTime('fecha_apertura');
            $table->dateTime('fecha_cierre')->nullable();
            $table->decimal('monto_inicial',10,2)->nullable();
            $table->decimal('monto_final',10,2)->nullable();
            $table->string('desc')->nullable();

            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')
                ->references('id')
                ->on('locals');

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
        Schema::dropIfExists('arqueos');
    }
};
