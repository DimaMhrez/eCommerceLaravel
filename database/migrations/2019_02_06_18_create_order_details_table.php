<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->double('totalPrice');
            $table->string('quantity',45);
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('productvariant_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('productvariant_id')->references('id')->on('product_variants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
