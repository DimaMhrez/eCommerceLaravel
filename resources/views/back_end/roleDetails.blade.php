@extends('back_end.main')

@section('title','Role details');

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon card-header-rose">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title ">Role: {{$role->name}}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <a href="{{url('/admin/role/'.$role->id.'/grantPermission')}}"><button class="btn btn-primary btn-sm" >New<div class="ripple-container"></div></button></a>
                                            <tr>
                                                 <th>
                                                      ID
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($perm as $p)
                                            <tr>
                                                <td>
                                                    {{ $p->id }}
                                                </td>
                                                <td>
                                                    {{ $p->name }}
                                                </td>
                                                <td>
                                                    <a href="{{url('/admin/role/revokePermission/'.$p->id.'/'.$role->id)}}" class="btn btn-link btn-danger btn-just-icon remove">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


