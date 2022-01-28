<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReproductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reproductions', function (Blueprint $table) {
             $table->increments('id');
            $table->unsignedInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index(); // this is working

            $table->date('created')->nullable(); //data de lançamento
            $table->date('delivery_date')->nullable(); //data do parto
            $table->date('coverage_date')->nullable(); //data cobertura
            $table->date('expected_delivery_date')->nullable(); //data previsão de parto
            $table->date('dry_date')->nullable(); //data para secar
            $table->date('pre_delivery_date')->nullable(); //data pré parto
            $table->string('del',5)->nullable(); //del
            $table->string('del_total',5)->nullable(); //del total
            $table->string('situation')->nullable(); //situação
            $table->string('observation1')->nullable(); //observação1
            $table->string('observation2')->nullable(); //observação2
            $table->timestamps();
            $table->foreign('user_id')
                              ->references('id')
                              ->on('users')
                              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reproductions');
    }


















}
