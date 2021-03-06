<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkingPlacesAlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marking_places_als', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('distric');
            $table->string('place');
            $table->string('medium');
            $table->string('subject');
            $table->string('paper_quntity');
            $table->integer('year');

            $table->boolean('is_complete')->default(0);

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
        Schema::dropIfExists('marking_places_als');
    }
}
