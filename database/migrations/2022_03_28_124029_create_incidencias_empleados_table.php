<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias_empleados', function (Blueprint $table) {
            $table->id();
            $table->integer('empleado_id');
            $table->integer('tipo_incidencia_id');
            $table->date('ie_fecha');
            $table->text('ie_comentarios');
            $table->boolean('ie_eliminado')->default(false);
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
        Schema::dropIfExists('incidencias_empleados');
    }
}
