<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // userからadminに変更
        // Schema::table('users', function (Blueprint $table) {
            Schema::table('admins', function (Blueprint $table) {
            $table->string('stripe_id')->nullable()->index();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four', 4)->nullable();
            $table->timestamp('trial_ends_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // userからadminに変更
        // Schema::table('users', function (Blueprint $table) {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn([
                'stripe_id',
                'card_brand',
                'card_last_four',
                'trial_ends_at',
            ]);
        });
    }
}
