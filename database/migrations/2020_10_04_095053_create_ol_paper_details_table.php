<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlPaperDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ol_paper_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bundle_number');
            $table->integer('paper_quntity');
            $table->integer('year');
            $table->string('writing_place');
            $table->string('medium');
            $table->string('subject');

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
        Schema::dropIfExists('ol_paper_details');
    }
}
