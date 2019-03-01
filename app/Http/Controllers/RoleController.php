<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back_end.roles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return view('back_end.roleDetails',compact('id'));
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

    public function permissions()
    {
        $roles = Role::all();
        return Datatables::of($roles)
            ->setRowId(function ($role){
                return $role->id;})
            ->addColumn('intro', function(Role $role) {
                return '<a href="'. url('/admin/order/'.$role->id) .'" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i><div class="ripple-container"></div></a>';
            })
            ->rawColumns(['intro'])
            ->toJson();
    }

    public function rolePermissions($id)
    {

        $role = Role::findByName($id);
        $role->load('permissions');

        if ($role != null) {
            $permissions = $role->getAllPermissions(); //trying to get permissions here throws error


            return Datatables::of($permissions)
                ->setRowId(function ($permission) {
                    return $permission->id;
                })
                ->toJson();

        }
    }


}
