<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\Datatables\Datatables;


class BackEndController extends Controller
{
    public function main(){
        return view('back_end.dashboard');
    }

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

    public function getUser($id){
        $user = User::find($id);

        return view('back_end.userProfile')->with('user',$user);
    }

    /*
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function anyData()
    {
        return Datatables::of(User::query()
            ->select('id','name','email'))
            ->setRowId(function ($user){
                return $user->id;
            })
            //->addColumn('intro','back_end.action')
            //->addColumn('intro', '<a href="{{ url(\'admin/userProfile/'.id.'\') }}" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>')

            ->addColumn('intro', function(User $user) {
                return '<a href="'. url('/admin/userProfile/'.$user->id) .'" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>';
            })
            ->rawColumns(['intro'])
            ->toJson();
        //return Datatables::of(User::)

        //return Datatables::eloquent(User::query())->make(true);
    }
}
