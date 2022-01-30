<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->integer('sucursal_id');
            $table->string('em_nombre');
            $table->date('em_fecha_nacimiento');
            $table->string('em_nss');
            $table->string('em_curp');
            $table->string('em_telefono');
            $table->string('em_cargo');
            $table->date('em_fecha_antiguedad');

            $table->string('em_path_acta')->nullable();
            $table->string('em_path_ine')->nullable();
            $table->string('em_path_curp')->nullable();
            $table->string('em_comprobante_dom')->nullable();
            $table->string('em_contrato')->nullable();

            $table->boolean('em_eliminado')->default(false);
            
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
        Schema::dropIfExists('empleados');
    }
}
