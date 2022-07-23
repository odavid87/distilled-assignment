<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->text('description');
            $table->string('tagline');
            $table->string('first_brewed');
            $table->string('brewery_location');
            $table->text('brewers_tips');
            $table->text('image_url');
            $table->double('abv');
            $table->json('ingredients');
            $table->json('food_pairing');
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
};
