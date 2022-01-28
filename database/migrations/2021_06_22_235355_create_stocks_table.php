<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
              $table->string('description')->nullable(); //descrição
              $table->bigInteger('user_id')->unsigned()->index(); // this is working
              $table->string('registration_date')->nullable(); //data de cadastro
              $table->string('price')->nullable(); //preço
              $table->string('the_amount')->nullable(); //quantidade
              $table->string('unity')->nullable(); //unidade
              $table->string('provider')->nullable(); //fornecedor
              $table->string('active')->nullable(); //ativo
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
        Schema::dropIfExists('stocks');
    }
}
