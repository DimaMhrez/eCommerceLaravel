@extends('back_end.main')


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
                                <h4 class="card-title ">Products</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
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
                                                    <a href="{{url('/admin/role/revokePermission/'.$p->id.'/'.$role)}}" class="btn btn-link btn-danger btn-just-icon remove">
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


