<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('category_id')->get();
        $subcategories = Category::where('category_id','0')->get();
        return View::make('back_end.createCategory',array('categories'=>$categories,'subcategories'=>$subcategories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function anyData()
    {
        return Datatables::of(Category::query()
            ->select('id','name','sortOrder','category_id'))
            ->setRowId(function ($category){
                return $category->id;
            })
            //->addColumn('intro','back_end.action')
            //->addColumn('intro', '<a href="{{ url(\'admin/userProfile/'.id.'\') }}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>')

            ->addColumn('intro', function(Category $category) {
                return '<a href="'. url('/admin/category/'.$category->id.'/edit') .'" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">edit</i></a>
                        <a href="'. url('/admin/') .'" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">euro_symbol</i><div class="ripple-container"></div></a>';
            })
            ->addColumn('parent', function(Category $category) {

                if ($category->category_id != null) {
                    $parent = Category::find($category->category_id);
                    return $parent->name;
                }else{
                    return '<i class="material-icons">highlight_off</i>';
                }
            })
            ->rawColumns(['intro','parent'])
            ->toJson();
        //return Datatables::of(User::)

        //return Datatables::eloquent(User::query())->make(true);
    }

    public function get(Request $request){

        $category=Category::where('name',$request->categoryname)->first();

        $subcategories=Category::where('category_id',$category->id)->get();


        return view('back_end.selectorderform')->with('subcategories',$subcategories)->render();

    }
}
