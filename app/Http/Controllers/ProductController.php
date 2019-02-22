<?php

namespace App\Http\Controllers;

use App\Brand;
use App\BulletDescription;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return View::make('back_end.createProduct',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = array(
            'name'       => 'required',
            'brand'      => 'required',
            'basicPrice' => 'required|numeric',
            'category'   => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/product/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));

        } else {

            $brandExist = Brand::where('name',Input::get('brand'))->select('id')->first();

            $product = new Product();

            if($brandExist != null){
              $product->brand_id = $brandExist->id;
            }else{
                $brand = new Brand();

                $brand->name = Input::get('brand');

                $brand->save();

                $product->brand_id = $brand->id;
            }

            $product->name = Input::get('name');
            $product->description = Input::get('fulldescription');
            $product->normalprice = Input::get('basicPrice');

            if(Input::get('showcase')){
                $product->showcase = 1;
            }else{
                $product->showcase = 0;
            }

            if(Input::get('featured')){
                $product->featured  = 1;
            }else{
                $product->featured  = 0;
            }

            if(Input::get('special')){
                $product->special = 1;
            }else{
                $product->special = 0;
            }


            $category = Category::where('id',Input::get('category'))->select('id')->first();

            $product->category_id = $category->id;


            $product->save();


            for ($i = 1; $i <= 7; $i++) {
                if(!empty(Input::get('bullet'.$i))){
                    $bullet = new BulletDescription();

                    $bullet->description = Input::get('bullet'.$i);
                    $bullet->product_id = $product->id;
                    $bullet->save();
                }
            }

            $productID = $product->id;
            return Redirect::to('image-view/'.$productID);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
