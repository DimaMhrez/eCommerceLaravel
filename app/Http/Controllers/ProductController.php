<?php

namespace App\Http\Controllers;

use App\Brand;
use App\BulletDescription;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Prophecy\Doubler\DoubleInterface;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.products');
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
        // get the product

        $item = Product::find($id);
        $brand = Brand::find($item->brand_id);
        $category = Category::find($item->category_id);

        //prelevo i bullet description dato $id che è l'$id del prodotto passato alla funzione edit
        $bulletDescription = BulletDescription::where('product_id', $id)->orderBy('id', 'asc')->get();


        //creo un array con tutti i dati necessari per il form
        $product = array('id'=>$item->id,
                         'name'=>$item->name,
                         'description'=>$item->description,
                         'brand'=>$brand->name,
                         'basicPrice'=>$item->normalPrice,
                         'category'=>$category->name,
                         'showcase'=>$item->showcase,
                         'featured'=>$item->featured,
                         'special'=>$item->special,
                         'bullet1'=>null,
                         'bullet2'=>null,
                         'bullet3'=>null,
                         'bullet4'=>null,
                         'bullet5'=>null,
                         'bullet6'=>null);

        $count = 1;


        //per ogni bullet d. voglio mettere in bullet.$count (ovvero bullet1 , bullet2 ...) i valori del campo description del bullet
        foreach ($bulletDescription as $bd) {
            $product['bullet' . $count] = $bd->description;
            $count++;
        }
        // show the edit form and pass the nerd
        return View::make('back_end.editProduct')
            ->with('product', $product);
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
            $product = Product::find($id);


            $brandExist = Brand::where('name',Input::get('brand'))->select('id')->first();


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


            $bulletDescription = BulletDescription::where('product_id', $id)->orderBy('id', 'asc')->get();

            foreach ($bulletDescription as $bd){
                $bd->delete();
            }


            for ($i = 1; $i <= 7; $i++) {
                if(!empty(Input::get('bullet'.$i))){
                    $bullet = new BulletDescription();

                    $bullet->description = Input::get('bullet'.$i);
                    $bullet->product_id = $product->id;
                    $bullet->save();
                }
            }


            return Redirect::to('/admin/product/');
        }
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


    public function anyData()
    {
        return Datatables::of(Product::query()
            ->select('id','name','normalPrice'))
            ->setRowId(function ($product){
                return $product->id;
            })
            //->addColumn('intro','back_end.action')
            //->addColumn('intro', '<a href="{{ url(\'admin/userProfile/'.id.'\') }}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>')

            ->addColumn('intro', function(Product $product) {
                return '<a href="'. url('/admin/product/'.$product->id.'/edit') .'" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>';
            })
            ->rawColumns(['intro'])
            ->toJson();
        //return Datatables::of(User::)

        //return Datatables::eloquent(User::query())->make(true);
    }
}
