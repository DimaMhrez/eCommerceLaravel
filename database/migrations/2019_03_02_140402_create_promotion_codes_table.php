<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotion_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->double('discount')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->boolean('global')->nullable();
            $table->boolean('used')->nullable();
            $table->string('code',20)->nullable();
            $table->string('description',100)->nullable();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion_codes');
    }
}
