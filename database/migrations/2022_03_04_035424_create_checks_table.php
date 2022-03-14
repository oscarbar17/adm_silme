<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->integer('empleado_id');
            $table->integer('sucursal_id');
            $table->datetime('ch_check_in');
            $table->datetime('ch_check_out')->nullable();
            $table->string('ch_photo_check_in');
            $table->string('ch_photo_check_out')->nullable();
            $table->string('ch_latitud_check_in');
            $table->string('ch_longitud_check_in');
            $table->string('ch_latitud_check_out')->nullable();
            $table->string('ch_longitud_check_out')->nullable();
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
        Schema::dropIfExists('checks');
    }
}
