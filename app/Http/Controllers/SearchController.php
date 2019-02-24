<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
class SearchController extends Controller
{
    public function searchBrands(Request $request)
    {
        return Brand::where('name', 'LIKE', '%'.$request->q.'%')->get();
    }
}