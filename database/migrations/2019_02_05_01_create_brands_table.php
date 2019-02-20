<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            //Attributi
            $table->string('name',45);
            $table->string('location',45)->nullable();
            $table->string('description',45)->nullable();
            $table->string('email',30)->nullable();
            $table->string('phoneNumber',10)->nullable();

            //Non ci sono chiavi esterne.

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
