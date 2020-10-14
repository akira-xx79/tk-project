<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompleteImagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_imags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('complete_id')->unsigned();
            $table->foreign('complete_id')->references('id')->on('completes');
            $table->unique(['complete_id'],'uq_roles');
            $table->string('image');
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
        Schema::dropIfExists('complete_imags');
    }
}
