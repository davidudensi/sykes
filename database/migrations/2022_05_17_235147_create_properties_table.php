<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('__pk');
            $table->unsignedInteger('_fk_location')->nullable();
            $table->string('property_name')->nullable();
            $table->boolean('near_beach')->unsigned()->nullable();
            $table->boolean('accepts_pets')->unsigned()->nullable();
            $table->unsignedTinyInteger('sleeps')->nullable();
            $table->unsignedTinyInteger('beds')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
