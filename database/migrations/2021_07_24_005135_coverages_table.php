<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coverages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('animal_id')->unsigned()->index(); // animal
            $table->date('last_birth')->nullable(); // último parto
            $table->string('type',55)->nullable(); // tipo de cobertura (Inseminação, Monta Natural, Embrião)
            $table->date('insemination_date')->nullable(); //data da inseminação
            $table->string('diagnosis',25)->nullable(); // diagnostico (Não Diagnosticado, Falha, Prenha)

            $table->date('date_next_heat')->nullable(); // data do proximo cio
            $table->date('date_touch')->nullable(); // data do proximo toque

            $table->date('dry_date')->nullable(); // data de secar
            $table->string('checkd_dry_date',18)->default('não informado'); // status de data de secagem marcada informada informado, não informado
            $table->date('transition_date')->nullable(); // data de transicao
            $table->date('delivery_date')->nullable(); // previsão de data do parto
            $table->string('iep',5)->nullable(); //iep = (data de previsão de parto - data do ultimo parto)
            $table->string('del',5)->nullable(); //del = (data do ultimo parto - data de hoje)
            $table->string('situation',20)->nullable(); //situação = Vaca pariu com sucesso, Abortou, 

            $table->string('insinuating',25)->nullable(); //Ensiminador
            $table->string('detail')->nullable(); //detalhe

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('animal_id')
                    ->references('id')
                    ->on('animals')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                              ->references('id')
                              ->on('users')
                              ->onDelete('cascade');

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
        Schema::dropIfExists('coverages');
    }
}
