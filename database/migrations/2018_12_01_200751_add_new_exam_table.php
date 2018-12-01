<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id')->unsigned()->index();
            $table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
            $table->integer('building_id')->unsigned()->index();
            $table->foreign('building_id')->references('id')->on('building')->onDelete('cascade');
            $table->string('room')->default('000')->nullable();
            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
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
        Schema::dropIfExists('exam');
    }
}
