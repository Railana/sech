<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoLetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo_letivos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('periodo_periodoLetivo', 10);
            $table->integer('ano_periodoLetivo');
            $table->string('modalidade_periodoLetivo', 45);
            $table->date('inicio_periodoLetivo');
            $table->date('termino_periodoLetivo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('periodo_letivos');
    }
}
