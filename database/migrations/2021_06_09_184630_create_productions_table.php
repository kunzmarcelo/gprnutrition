<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_milking');
            $table->unsignedInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->string('first_milking',20)->nullable();//primeira ordenha
            $table->string('second_milking',20)->nullable();//segunda ordenha
            $table->string('third_milking',20)->nullable();//terceira ordenha
            $table->string('total_milking',20)->nullable();//total de ordenha
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
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
        Schema::dropIfExists('productions');
    }
}
