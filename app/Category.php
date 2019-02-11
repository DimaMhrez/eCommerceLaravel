<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryHasProductVariant;

class Category extends Model
{
    function products(){
        return $this->morphToMany('CategoryHasProductVariant','product_has_category');
    }
}
