<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryHasProductVariant;

class Product extends Model
{



    function categories(){
        return $this->morphToMany('CategoryHasProductVariant','product_has_category');
    }


    public function bullets()
    {
        return $this->hasMany('App\BulletDescription');
    }

}
