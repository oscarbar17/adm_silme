<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulosRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos_roles', function (Blueprint $table) {
            $table->id();
            $table->integer('modulo_id');
    		$table->integer('rol_id');
    		$table->boolean('ms_habilitado')->default(true);
    		$table->boolean('ms_insert')->default(false);
    		$table->boolean('ms_delete')->default(false);
    		$table->boolean('ms_update')->default(false);
    		$table->boolean('ms_eliminado')->default(false);
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
        Schema::dropIfExists('modulos_roles');
    }
}
