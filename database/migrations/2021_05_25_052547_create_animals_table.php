<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('earring')->nullable(); // brinco
            $table->string('record')->nullable(); // registro
            $table->string('name')->nullable(); // nome
            $table->unsignedInteger('lot_id');
            $table->foreign('lot_id')->references('id')->on('lots')->onDelete('cascade');
            $table->date('birth_date')->nullable(); // data nascimento
            $table->string('breed')->nullable(); // raça
            $table->string('blood_grade')->nullable(); // grau de sangue
            $table->string('sex')->nullable(); // sexo
            $table->string('origin')->nullable(); // origem
            $table->date('date_of_last_delivery')->nullable(); // data do ultimo parto 
            $table->date('able_to_get_pregnant')->nullable(); // data apto a emprenhar 
            $table->string('value',20)->nullable(); // valor
            $table->date('weaning_date')->nullable(); // data do desmame
            $table->string('mother_on_the_property')->nullable(); // mãe na propriedade
            $table->string('father_on_the_property')->nullable(); // pai na propriedade
            $table->string('image')->nullable(); //
            $table->string('active',10)->nullable(); // ativo / sim ou não
            $table->string('comments')->nullable(); //
            $table->string('to_discard',10)->nullable(); // para descarte? sim ou nao
            $table->string('animal_stage',50)->nullable(); // Fase do animal, se é novilha, vaca,
            $table->bigInteger('user_id')->unsigned()->index(); // 
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
      Schema::dropIfExists('animal_medicine');
        Schema::dropIfExists('animals');
    }
}
