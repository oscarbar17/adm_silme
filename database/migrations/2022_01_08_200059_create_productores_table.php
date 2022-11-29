<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productores', function (Blueprint $table) {
            $table->id();
            $table->integer('producto_id');
            $table->integer('municipio_id');
            $table->string('pr_nombre');
            $table->enum('pr_cultivo',['RIEGO','TEMPORAL']);
            $table->string('pr_correo')->nullable();
            $table->string('pr_telefono');
            $table->boolean('pr_eliminado')->default(false);
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
        Schema::dropIfExists('productores');
    }
}
