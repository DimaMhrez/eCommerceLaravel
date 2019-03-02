<?php

namespace App\Http\Controllers;

use App\PromotionCode;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class GlobalPromotionalCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.globalPromotionalCodes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.createGlobalPromotionalCodes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'code'         => 'required',
            'description'  => 'required',
            'discount'     => 'required|numeric',
            'from'         => 'required',
            'to'           => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/admin/globalPromotionalCodes/create')
                ->withErrors($validator);
        } else {

            $code = new PromotionCode();

            //Converto nel giusto formato i timestamp
            $from = Input::get('from');
            $timefrom = strtotime($from);
            $fromReady = date("Y-m-d G:i:s",$timefrom);

            $to = Input::get('from');
            $timeto = strtotime($to);
            $toReady = date("Y-m-d G:i:s",$timeto);


            $code->from_date = $fromReady;
            $code->to_date = $toReady;
            $code->code = Input::get('code');
            $code->description = Input::get('description');
            $code->discount = Input::get('discount');
            $code->global = 1;
            $code->save();

            return Redirect::to('/admin/globalPromotionalCodes');
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

    public function globalPromotionalCodes(){
        $globalCodes = PromotionCode::where('global',1)->where('to_date','>=',DB::raw('NOW()'))->orderBy('to_date','desc')->get();

        return DataTables::of($globalCodes)
            ->setRowId(function ($globalCode){
                return $globalCode->id;})
            ->addColumn('intro', function(PromotionCode $globalCode) {
                return '<a href="'. url('/admin/globalPromotionalCodes/'.$globalCode->id.'/edit') .'" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i><div class="ripple-container"></div></a>';
            })
            ->addColumn('from_date', function(PromotionCode $globalCode) {
                return date('d/m/Y H:i:s',strtotime($globalCode->from_date));
            })
            ->addColumn('to_date', function(PromotionCode $globalCode) {
                return date('d/m/Y H:i:s',strtotime($globalCode->to_date));
            })
            ->rawColumns(['intro','from_date','to_date'])
            ->toJson();
    }
}
