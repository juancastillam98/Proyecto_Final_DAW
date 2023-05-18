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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("nombre", 50);
            $table->string("primer_apellido", 50);
            $table->string("segundo_apellido", 50);
            $table->string("direccion", 100);
            $table->string("telefono", 15);
            //$table->string("email",15); lo hereda de USER
            $table->longText("experiencia_laboral");
            $table->longText("habilidades");
            $table->string('foto')->nullable();
            $table->set('rol', ["user", "admin"])->nullable()->default("user");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
