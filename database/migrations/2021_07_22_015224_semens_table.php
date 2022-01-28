<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SemensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('record')->nullable();
            $table->string('name');
            $table->string('supplier_company')->nullable();
            $table->string('sexed')->nullable();
            $table->bigInteger('breed_id')->unsigned()->index();
            $table->bigInteger('blood_id')->unsigned()->index();
              $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->foreign('user_id')
                              ->references('id')
                              ->on('users')
                              ->onDelete('cascade');
            $table->foreign('breed_id')
                              ->references('id')
                              ->on('breeds')
                              ->onDelete('cascade');
            $table->foreign('blood_id')
                              ->references('id')
                              ->on('bloods')
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
        Schema::dropIfExists('bloods');
    }
}
