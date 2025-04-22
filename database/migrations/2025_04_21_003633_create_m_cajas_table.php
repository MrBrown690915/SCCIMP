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
        Schema::create('m_cajas', function (Blueprint $table) {
            $table->id();

            $table->string('tipo');
            $table->decimal('monto',10,2);
            $table->string('desc')->nullable();

            $table->unsignedBigInteger('arqueo_id');
            $table->foreign('arqueo_id')
                ->references('id')
                ->on('arqueos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_cajas');
    }
};
