<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_medico');
            $table->unsignedBigInteger('id_agenda');
            $table->string('status');
            $table->date('dataAgendamento');

            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('CASCADE');
            $table->foreign('id_medico')->references('id')->on('medicos')->onDelete('CASCADE');
            $table->foreign('id_agenda')->references('id')->on('agendas')->onDelete('CASCADE');

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
        Schema::dropIfExists('atendimentos');
    }
}
