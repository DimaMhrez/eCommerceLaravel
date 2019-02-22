<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('back_end.imageUpload',compact('id'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $imageName = request()->file->getClientOriginalName();
        request()->file->move(public_path('upload'), $imageName);

        $photo = new Photo();
        $photo->URL = "/upload/".$imageName;
        $photo->product_id = $id;
        $photo->save();
        return response()->json(['uploaded' => '/upload/'.$imageName]);
    }
}