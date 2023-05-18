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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("nombre")->unique();
            //$table->string("email", 50); una empresa pertenece a un usuario, este es el email del usuario.
            $table->string("telefono", 15)->unique();
            $table->string("cif", 18)->unique();
            $table->string("web")->unique();
            $table->string("direccion");
            $table->integer("empleados")->nullable();
            $table->longText("descripcion")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
