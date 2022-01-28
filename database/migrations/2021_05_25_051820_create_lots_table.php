<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',191);
            $table->string('phase',191)->nullable();//fase
            $table->string('description',191)->nullable();
            $table->string('color',191)->nullable();//cor do lote
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
        Schema::dropIfExists('lots');
    }
}
