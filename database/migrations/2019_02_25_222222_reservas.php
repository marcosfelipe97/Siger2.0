<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reservas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('horario', function (Blueprint $table) {
          
            $table->increments('id');
            $table->string('descricao');
            $table->time('hora');
                        
        });





        Schema::create('reservas', function (Blueprint $table) {
       
            $table->increments('id');
            $table->integer ('equipamentos_id')->unsigned();
            $table->foreign('equipamentos_id')->references('id')->on('equipamentos')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('horario_id')->unsigned();
            $table->foreign('horario_id')->references('id')->on('horario');
            $table->date('dt_agendamento');
            $table->boolean('is_devolvido')->default(false);
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
        Schema::dropIfExists('reservas');
    }
}
