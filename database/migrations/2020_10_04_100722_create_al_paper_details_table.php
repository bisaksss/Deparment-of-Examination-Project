<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlPaperDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('al_paper_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bundle_number');
            $table->integer('paper_quntity');
            $table->integer('year');
            $table->string('distric');
            $table->string('writing_place');
            $table->string('medium');
            $table->string('subject');

            $table->boolean('is_complete')->default(0);

            $table->string('exam_type')->default('al');

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
        Schema::dropIfExists('al_paper_details');
    }
}
