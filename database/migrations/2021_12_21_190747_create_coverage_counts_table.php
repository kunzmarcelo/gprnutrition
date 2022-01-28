<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverageCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coverage_counts', function (Blueprint $table) {
            $table->id();
            $table->integer('animal_id')->unsigned()->index(); // animal
            $table->bigInteger('user_id')->unsigned()->index(); // usuário
            $table->string('count_insemination',10)->nullable(); //contagem de cobertura
            $table->string('pregnancy_percentage',10)->nullable(); //porcentagem prenhez
            
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
        Schema::dropIfExists('coverage_counts');
    }
}
