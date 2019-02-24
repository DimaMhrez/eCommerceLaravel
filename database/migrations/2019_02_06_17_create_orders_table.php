<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //Attributi
            $table->dateTime('date');
            $table->string('note',100);
            $table->string('status',45);
            $table->double('totalprice');

            //Chiavi esterne
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('payment_method_id');
            $table->unsignedInteger('payment_method_user_id');
            $table->unsignedInteger('shipper_id');
            $table->unsignedInteger('shipping_address_id');

            //Realizzazione chiavi esterne
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('payment_method_user_id')->references('user_id')->on('payment_methods');
            $table->foreign('shipper_id')->references('id')->on('shippers');
            $table->foreign('shipping_address_id')->references('id')->on('shipping_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
