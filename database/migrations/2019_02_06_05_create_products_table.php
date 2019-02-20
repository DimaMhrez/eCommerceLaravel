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
            $table->text('description')->nullable();
            $table->double('normalPrice');
            $table->tinyInteger('new')->nullable();
            $table->tinyInteger('Rate')->default('0')->nullable();
            $table->tinyInteger('showcase')->default('1');
            $table->tinyInteger('featured')->default('1');
            $table->tinyInteger('special')->default('0');
            $table->Integer('reviewsnumber')->default('0');


            //Chiavi esterne
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('productDescription_id')->nullable();
            $table->unsignedInteger('sale_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();

            //Connessioni alle altre tabelle
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('bulletDescription_id')->references('id')->on('bullet_descriptions');
            $table->foreign('sale_id')->references('id')->on('sales');


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
