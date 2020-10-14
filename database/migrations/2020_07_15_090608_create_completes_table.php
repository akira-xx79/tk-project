<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('production_id')->unsigned();
            $table->bigInteger('creator_id')->unsigned();
            $table->integer('lead_time');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('production_id')->references('id')->on('production');
            $table->foreign('creator_id')->references('id')->on('creators');
            $table->unique(['production_id', 'creator_id'],'uq_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completes');
    }
}
