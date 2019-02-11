<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\Datatables\Datatables;


class BackEndController extends Controller
{
    public function users(){

        $users=User::OrderBy('surname','asc')->simplePaginate(10);

        return view('back_end.users')->with('users',$users);

    }

    /*
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getUsers()
    {
        return view('back_end.users');
    }

    /*
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function anyData()
    {
        return Datatables::of(User::query())->make(true);
    }
}
