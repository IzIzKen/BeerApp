<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('brewery_id')->unsigned();
//            $table->bigInteger('local_id');
            $table->bigInteger('style_id')->unsigned();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->integer('bitterness');
            $table->integer('sweetness');
            $table->integer('acidity');
            $table->integer('deepness');
            $table->integer('strength');
            $table->timestamps();
            $table->foreign('brewery_id')->references('id')->on('breweries');
            $table->foreign('style_id')->references('id')->on('styles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }
}
