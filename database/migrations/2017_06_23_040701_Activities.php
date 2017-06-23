<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Activities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('activities', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->string('name', 255);
          $table->text('description');
          $table->date('start_date');
          $table->date('end_date')->nullable();
          $table->integer('status_id')->unsigned();
          $table->boolean('situation');
          $table->softDeletes();
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('status_id')->references('id')->on('status');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
