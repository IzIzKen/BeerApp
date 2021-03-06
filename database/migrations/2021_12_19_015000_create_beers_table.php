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
            $table->unsignedBigInteger('brewery_id');
            $table->unsignedBigInteger('style_id');
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->integer('price')->nullable();
            $table->string('alcohol')->nullable();
            $table->string('img_url');
            $table->double('bitterness')->nullable();
            $table->integer('sweetness')->nullable();
            $table->integer('acidity')->nullable();
            $table->double('deepness')->nullable();
            $table->double('strength')->nullable();
            $table->text('description');

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
