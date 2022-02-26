<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->integer('sucursal_id');
            $table->integer('empleado_id');
            $table->integer('productor_id');
            $table->integer('municipio_id');
            $table->integer('marca_id');
            $table->integer('producto_id');
            $table->integer('ev_superficie');
            $table->enum('ev_tipo_evento',['SALIDA A CAMPO','CAPACITACION','MOSTRADOR']);
            $table->enum('ev_estatus',['ABIERTO','CERRADO']);
            $table->enum('ev_tipo_cultivo',['RIEGO','TEMPORAL']);
            $table->double('ev_latitud');
            $table->double('ev_longitud');
            $table->text('ev_notas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
