<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Category;

class CategoryHasProductVariant extends Model
{
    public function posts()
    {
        return $this->morphedByMany('Product', 'product_has_category');
    }

    public function videos()
    {
        return $this->morphedByMany('Category', 'product_has_category');
    }
}
