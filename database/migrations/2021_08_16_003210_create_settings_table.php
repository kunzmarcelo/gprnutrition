<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dry_animal',5)->nullable(); //secar animal
            $table->string('pre_delivery',5)->nullable(); //pre parto
            $table->string('animal_birth',5)->nullable(); //parto animal
            $table->string('pregnancy_confirmation',5)->nullable(); //confirmação de prenhez
            $table->string('released_for_ultrasound',5)->nullable(); //liberado para ultrasson
            $table->string('days_to_weaning',5)->nullable(); //dias para desmame
            $table->string('voluntary_waiting_period',5)->nullable(); //periodo voluntario de espera (PVE)
            $table->decimal('average_day_of_the_month',10,2)->nullable(); // media de dias do mês ex: 30,5
            $table->bigInteger('user_id')->unsigned()->index();
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
        Schema::dropIfExists('settings');
    }
}
