<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->unsignedBigInteger('role_id')->nullable();
          $table->string('address',200)->nullable();
          $table->string('phone',20)->nullable();
          $table->string('cpf',20)->nullable();
          $table->string('responsible',120)->nullable(); // responsavel da propriedade
          $table->string('level',10)->default('produtor');
          $table->string('status',5)->default('não');
          $table->foreign('role_id')
          ->references('id')
          ->on('roles')
          ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropForeign('users_role_id_foreing');
        $table->dropIndex('role_id');
      });
    }
}
