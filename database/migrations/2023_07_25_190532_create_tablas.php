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
        Schema::create('usuario', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('nombre',50);
            $table->date('fecha_nac');
            $table->string('telefono',15);
            $table->string('email',50)->unique();
            $table->string('sexo',10);
            $table->string('tipo',20);
            $table->string('password',255);
            $table->timestamps();

        });

        Schema::create('departamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('descripcion',250);
            $table->string('estado',15);
            $table->timestamps();

        });

        Schema::create('Usuario_Departamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_departamento');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->timestamps();

            $table->primary(['id_usuario','id_departamento']);
            
        });

        Schema::create('mensaje', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tipo',15);
            $table->String('contenido',500);

            $table->unsignedBigInteger('id_emisor');
            $table->unsignedBigInteger('id_receptor');

        });

        Schema::create('servicio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->timestamps();

        });

        Schema::create('pago', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->unsignedBigInteger('monto');
            $table->string('estado',15);
            $table->timestamps();

            $table->unsignedBigInteger('id_servicio');
            $table->unsignedBigInteger('id_usuario');

        });
       
        Schema::create('reunion', function (Blueprint $table) {
            $table->id();
            $table->string('asunto',150);
            $table->string('descripcion',500);
            $table->date('fecha');
            $table->string('conclusion',500);
            $table->timestamps();

            $table->unsignedBigInteger('id_usuario');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Usuario');
        Schema::dropIfExists('Departamento');
        Schema::dropIfExists('Usuario_Departamento');
        Schema::dropIfExists('Mensaje');
        Schema::dropIfExists('Servicio');
        Schema::dropIfExists('Pago');
        Schema::dropIfExists('Reunion');
    }
};
