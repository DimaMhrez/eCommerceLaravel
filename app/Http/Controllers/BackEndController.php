<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    public function users(){

        $users=User::OrderBy('surname','asc')->simplePaginate(10);

        return view('back_end.users')->with('users',$users);

    }
}
