<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::raw('
          CREATE TRIGGER add_review AFTER INSERT ON `reviews` FOR EACH ROW
          BEGIN
          update products set reviewsnumber=reviewsnumber+1 
          where id=new.product_id;
          END
            
        ');
        DB::raw('
        CREATE TRIGGER update_rate AFTER INSERT ON `reviews` FOR EACH ROW
        BEGIN
          update products set rate=(rate+new.rate)/2
          where id=new.product_id;
        END
');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::raw('DROP TRIGGER `add_review`');
       DB::raw('DROP TRIGGER `update_rate` ');
    }
}
