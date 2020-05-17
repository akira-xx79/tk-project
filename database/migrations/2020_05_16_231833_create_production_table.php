<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('contact_number')->unsigned();
            $table->string('company_name');
            $table->string('slug');
            $table->string('completed')->default('未着手');
            $table->integer('category_id')->unsigned();
            $table->string('product_name');
            $table->integer('numcer')->unsigned();
            $table->integer('materiar_id');
            $table->text('comment');
            $table->string('image');
            $table->date('date');
            $table->integer('shipment_location_id')->unsigned();
            $table->integer('carrier_id')->unsigned();
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
        Schema::dropIfExists('production');
    }
}
