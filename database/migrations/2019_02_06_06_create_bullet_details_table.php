<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulletDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bullet_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('detail',256);
            $table->unsignedInteger('product_id');

            $table->foreign('product_id')->references('id')->on('products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bullet_details');
    }
}
