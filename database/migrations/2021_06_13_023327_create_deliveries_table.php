<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
              $table->date('collection_date',191)->nullable();//data coleta
              $table->string('liters_delivered',10)->nullable();//litros entregues
              $table->string('liters_consumption',19)->nullable();//litros consumo
              $table->string('liters_internal_consumption',19)->nullable();//litros consumo interno
              $table->string('discarded_liters',19)->nullable();//litros descartados
              $table->string('total_liters_produced',19)->nullable();//total de litros produzidos
              $table->string('milk_price',19)->nullable();//preco do leite
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
        Schema::dropIfExists('deliveries');
    }
}
