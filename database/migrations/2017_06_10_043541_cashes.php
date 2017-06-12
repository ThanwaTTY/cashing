<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cashes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cashes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned()->index();
          $table->string('method');
          $table->string('fromBank');
          $table->string('fromAccountNumber');
          $table->string('fromAccountName');
          $table->integer('amount')->unsigned();
          $table->date('transferDate');
          $table->time('transferTime');
          $table->string('toBank');
          $table->string('toAccountNumber');
          $table->string('toAccountName');
          $table->string('transferStatus')->default();
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
      Schema::dropIfExists('cashes');
    }
}
