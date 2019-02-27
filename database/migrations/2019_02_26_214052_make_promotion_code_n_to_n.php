<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePromotionCodeNToN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promotion_code', function (Blueprint $table) {

            $table->boolean('Global')->nullable();
            $table->boolean('Used')->nullable();
        });

        Schema::create('user_has_promotion_code', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('promotion_code_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('promotion_code_id')->references('id')->on('promotion_code');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('n', function (Blueprint $table) {
            //
        });
    }
}
