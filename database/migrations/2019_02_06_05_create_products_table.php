<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //Attributi

            $table->string('name',45);
            $table->string('description',45);
            $table->double('normalPrice');
            $table->tinyInteger('new');
            $table->string('mediumSale',45);

            //Chiavi esterne
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('bulletDescription_id');
            $table->unsignedInteger('sale_id');
            $table->unsignedInteger('product_type');

            //Connessioni alle altre tabelle
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('bulletDescription_id')->references('id')->on('bullet_descriptions');
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->foreign('product_type')->references('id')->on('products');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
