<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKajiansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kajians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mosque')->unsigned();
            $table->string('pemateri');
            $table->string('tema');
            $table->date('waktu');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_mosque')->references('id')->on('mosques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kajians');
    }
}
