<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            //Attributi
            $table->increments('id');
            $table->string('name',20);
            $table->string('surname',20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',20);
            $table->rememberToken();
            $table->timestamps();

            //L'entità utente non ha chiavi esterne.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
