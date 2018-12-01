<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned()->index();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('exam_id')->unsigned()->index();
            $table->foreign('exam_id')->references('id')->on('exam');
            $table->integer('building_id')->unsigned()->index();
            $table->foreign('building_id')->references('id')->on('building');
            $table->datetime('notify_date')->nullable();
            $table->integer('notify_frequency')->unsigned()->limit(2)->nullable();
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
        Schema::dropIfExists('notification');
    }
}
