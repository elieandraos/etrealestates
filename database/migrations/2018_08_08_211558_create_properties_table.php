<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->double('amount', 8, 2)->index();
            $table->integer('sq_ft')->index();
            $table->string('city')->nullable();
            $table->integer('nb_bathrooms')->index()->nullable();
            $table->integer('nb_parkings')->index()->nullable();
            $table->integer('nb_bedrooms')->index()->nullable();
            $table->text('additional_info')->nullable(); // for stuff like master bedroom, sea view, reception etc...
            $table->float('lat', 10, 6);
            $table->float('lng', 10, 6);
            $table->string('listed_for')->index()->default('sale'); // sale or rent

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');

            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

            $table->integer('listed_by')->unsigned();
            $table->foreign('listed_by')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('properties');
    }
}
