<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream
use App\Category;
=======
use App\Brand;
>>>>>>> Stashed changes

class SearchController extends Controller
{
    public function searchBrands(Request $request)
    {
        return Brand::where('name', 'LIKE', '%'.$request->q.'%')->get();
    }
<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
}
