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
        Schema::table('mensaje', function (Blueprint $table) {
            $table->foreign('id_emisor')->references('id')->on('usuario');
            $table->foreign('id_receptor')->references('id')->on('usuario');
        });

        Schema::table('usuario_departamento', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('usuario');
            $table->foreign('id_departamento')->references('id')->on('departamento');
        });

        Schema::table('pago', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('usuario');
            $table->foreign('id_servicio')->references('id')->on('servicio');
        });

        Schema::table('reunion', function (Blueprint $table) {
            $table->foreign('id_usuario')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
