<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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
        return view('back_end.createRole');
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
            'name'       => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/permission/create')
                ->withErrors($validator);
        } else {

            $role = Role::where('name',Input::get('name'))->select('name')->first();

            if($role == null){
                Role::create(['name'=>Input::get('name')]);
                return Redirect::to('/admin/role/');
            }else{
                return Redirect::to('/admin/role/create')
                    ->withErrors('Already Exist');
            }
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

        $role = Role::findByID(intval($id));
        $permission = null;

        if ($role != null) {
            $permissions = $role->permissions()->get(); //trying to get permissions here throws error
        }
        return view('back_end.roleDetails')->with('perm',$permissions)->with('role',$role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update($role)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findById(intval($id));

        if($role != null)
            $role->delete();

        return back();
    }

    public function permissions()
    {

        $roles = Role::all();
        return Datatables::of($roles)
            ->setRowId(function ($role){
                return $role->id;})
            ->addColumn('intro', function(Role $role) {
                return '<a href="'. url('/admin/role/'.$role->id) .'" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i><div class="ripple-container"></div></a>
                        <a href="' . url('/admin/role/delete/' . $role->id) .'" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i><div class="ripple-container"></div></a>';
            })
            ->rawColumns(['intro'])
            ->toJson();
    }

    public function revokePermission($perm,$role){

        $id = intval($role);
        $role = Role::findById($id);
        if($role != null) {
            $role->revokePermissionTo(Permission::findById($perm));
        }

        return back();
    }

    public function grantPermission($id)
    {
        $permissions = Permission::all();
        return view('back_end.grantPermissionToRole')->with('permissions',$permissions)->with('idRole',$id);
    }

    public function writeRole($idRole){
        $role = Role::findById(intval($idRole));
        if($role != null){
            $perm = Permission::findByID(Input::get('permission'));
            if($perm != null){
                $role->givePermissionTo($perm);
            }
        }
    }

    public function getUserRoles($id){
        $roles = Role::select('id','name')
                 ->join('model_has_roles','model_has_roles.role_id','=','roles.id')
                 ->where('model_has_roles.model_id',$id)
                 ->get();

        return $roles;
    }

    public function userRoles($id){
        $roles = $this->getUserRoles($id);
        return view('back_end.userRoles')->with('id',$id)->with('roles',$roles);
    }

    public function revokeRole($id,$user){

        $role = Role::findById($id);

        $user = User::find($user);

        $user->removeRole($role->name);

        return view('back_end.users');

    }

    public function grantRole($user){
        $roles = Role::all();
        return view('back_end.grantRoleToUSer')->with('roles',$roles)->with('idUser',$user);
    }

    public function assignRole($user){
        $rules = array(
            'permission'       => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/admin/role/grantRole/'.$user)
                ->withErrors($validator);
        } else {
            $role = Role::findById(Input::get('permission'));

            if($role != null){
                $user = User::find($user);

                $user->assignRole($role->name);

            }

            return Redirect::to('/admin/userProfile/'.$user->id.'/roles');
        }
    }


}
