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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('oferta_id')->nullable();
            $table->foreign('oferta_id')->references('id')->on('oferta_empleos');
            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->string("estado", 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
