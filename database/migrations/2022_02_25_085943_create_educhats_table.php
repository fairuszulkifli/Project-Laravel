<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEduchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educhats', function (Blueprint $table) {
            $table->id();
            $table->string('educhatrespon');
            $table->string('educhatkeyword');
            //$table->bigInteger('material_id')->unsigned();
            $table->timestamps();
            //$table->foreign('material_id')->references('id')->on('meterials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educhats');
    }
}
