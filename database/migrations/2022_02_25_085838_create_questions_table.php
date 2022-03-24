<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('parentcode');
            $table->string('questioncode');
            $table->string('typequestion');
            $table->string('detailquestion');
            $table->string('detailsolution');
            $table->string('status');
            $table->string('createddate');
            $table->string('createdby');
            $table->string('publishstatus');
            $table->string('publishdate');
            $table->string('publishby');
            $table->string('modifieddate');
            $table->string('modifiedby');
            $table->bigInteger('topic_id')->unsigned();
            //$table->bigInteger('answer_id')->unsigned();
            $table->timestamps();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
            //$table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
