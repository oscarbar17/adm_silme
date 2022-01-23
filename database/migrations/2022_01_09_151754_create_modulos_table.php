<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable(); 
    		$table->string('mo_ruta',255)->nullable();
    		$table->string('mo_params_ruta',500)->nullable();
    		$table->string('mo_descripcion',255); 
    		$table->integer('mo_orden');
    		$table->string('mo_atributos',500)->nullable();
    		$table->string('mo_icono',255)->nullable();
    		$table->boolean('mo_publicado')->default(true);
    		$table->boolean('mo_admin')->default(false);
    		$table->boolean('mo_predef')->default(false);
    		$table->boolean('mo_eliminado')->default(false);
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
        Schema::dropIfExists('modulos');
    }
}
