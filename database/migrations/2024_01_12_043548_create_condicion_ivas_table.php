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
        Schema::create('condicion_iva', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('codigo')->nullable(false);
            $table->string('condicion_iva', 50)->nullable(false);
            $table->float('alicuota', 10, 3)->nullable(true);
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
        Schema::dropIfExists('condicion_iva');
    }
};
