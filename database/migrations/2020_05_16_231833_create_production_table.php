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
            $table->increments('user_id');
            $table->increments('contact_number');
            $table->storing('company_name');
            $table->storing('slug');
            $table->storing('completed')->default('未着手');
            $table->increments('category_id');
            $table->storing('product_name');
            $table->increments('numcer');
            $table->increments('materiar_id');
            $table->text('comment');
            $table->storing('image');
            $table->date('date');
            $table->increments('shipment_location_id');
            $table->increments('carrier_id');
            $table->nullableTimestamps('created_at')->useCurrent();
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
