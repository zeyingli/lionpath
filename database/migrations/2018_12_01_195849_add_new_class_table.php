<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id')->unsigned()->index();
            $table->foreign('building_id')->references('id')->on('building')->onDelete('cascade');
            $table->integer('nbr')->unsigned()->unique();
            $table->string('name')->index();
            $table->decimal('unit', 3, 2)->default('0.00');
            $table->string('section')->default('000');
            $table->string('room')->nullable();
            $table->string('instructor');
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->tinyInteger('status')->unsigned()->default('0');
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
        Schema::dropIfExists('class');
    }
}
