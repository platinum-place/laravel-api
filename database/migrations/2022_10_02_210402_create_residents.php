<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('Nombre');
            $table->string('Apellidos');
            $table->integer('Telefono');
            $table->string('Correo');
            $table->integer('Edad');
            $table->string('Direccion');
            $table->boolean('Comida_Entregada')->default(false);
            $table->text('Observacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residents');
    }
};
