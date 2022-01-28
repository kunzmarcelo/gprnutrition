<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->nullable(); //data de inicio

            $table->unsignedInteger('animal_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->unsignedInteger('stock_id')->unsigned()->index();

            $table->string('total_production')->nullable(); //produção total dia
            $table->string('coefficient')->nullable(); //coeficiente
            $table->string('result')->nullable(); //resultado
            $table->string('production_projection')->nullable(); //projeção de producao
            $table->date('analysis_time')->nullable(); //tempo de analise


            $table->string('description')->nullable(); //descrição
            $table->string('amount_of_meals')->nullable(); //quantidade de refeições
            $table->string('application')->nullable(); //aplicação
            $table->string('number_of_animals')->nullable(); //numero de animais
            $table->string('total_amount')->nullable(); //quantidade total
            $table->string('cost_price')->nullable(); //preço de custo
            $table->string('subtotal')->nullable(); //subtotal
            $table->string('projected_production')->nullable(); //produção projetada
            $table->string('active')->nullable(); //ativo

            $table->foreign('user_id')
                              ->references('id')
                              ->on('users')
                              ->onDelete('cascade');
            $table->foreign('animal_id')
                              ->references('id')
                              ->on('animals')
                              ->onDelete('cascade');
            $table->foreign('stock_id')
                              ->references('id')
                              ->on('stocks')
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
        Schema::dropIfExists('challenges');
    }
}
