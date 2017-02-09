<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCorreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('correos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('destino');
          $table->string('asunto');
          $table->string('mensaje');
          $table->integer('id_user');
          $table->integer('enviado')->default('0');
          $table->string('remite');
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
        //
    }
}
