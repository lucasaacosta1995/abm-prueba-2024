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
        Schema::create('producto_servicio', function (Blueprint $table) {
            $table->id();
            $table->integer('id_rubro')->index()->nullable(true);
            $table->enum('tipo', ['P', 'S'])->nullable(true);
            $table->integer('id_unidad_medida')->index()->nullable(true);
            $table->string('codigo', 20)->nullable(true);
            $table->string('producto_servicio', 255)->nullable(true);
            $table->integer('id_condicion_iva')->index()->nullable(true);
            $table->float('precio_bruto_unitario', 30, 2)->nullable(true);
            $table->foreign('id_unidad_medida')->references('id')->on('unidad_media');
            $table->foreign('id_rubro')->references('id')->on('rubro');
            $table->foreign('id_condicion_iva')->references('id')->on('condicion_iva');
            $table->softDeletes();
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
        Schema::dropIfExists('producto_servicio');
    }
};
