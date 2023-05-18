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
        Schema::create('oferta_empleos', function (Blueprint $table) {
            $table->id();
            //puesto
            $table->unsignedBigInteger('puesto_id')->nullable();
            $table->foreign('puesto_id')->references('id')->on('puestos');
            //empresa
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->integer("numpuestos")->nullable();
            $table->date("fecha_publicacion");
            $table->date("fecha_cierre")->nullable();
            $table->longText("descripcion");
            $table->longText("requisitos");
            $table->float("salario", 10, 2)->nullable();
            $table->set('tipo_salario', ["neto", "bruto"])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oferta_empleos');
    }
};
