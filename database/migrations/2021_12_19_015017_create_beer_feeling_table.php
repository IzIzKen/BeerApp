<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeerFeelingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer_feeling', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('beer_id')->unsigned();
            $table->bigInteger('feeling_id')->unsigned();
            $table->timestamps();

            $table->foreign('beer_id')->references('id')->on('beers');
            $table->foreign('feeling_id')->references('id')->on('feelings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beer_feeling');
    }
}
