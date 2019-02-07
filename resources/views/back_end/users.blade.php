php @extends('back_end.main')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">DataTables.net</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <div class="dataTables_wrapper dt-bootstrap4" id="tables_wrapper">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="datatables_length">
                                                <label>
                                                    Show
                                                    <select name="datatables_length" aria-controls="datatables"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="-1">All</option>
                                                    </select>
                                                    entries
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="datatables_filter" class="dataTables_filter">
                                                <label>
                                                        <span class="bmd-form-group bmd-form-group-sm">
                                                            <input type="search" class="form-control form-control-sm"
                                                                   placeholder="Search records"
                                                                   aria-controls="datatables">
                                                        </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="datatables"
                                                   class="table table-striped table-no-bordered table-hover"
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Email</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Email</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>

                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->surname}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td class="text-right">
                                                            <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                                                            <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                            <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                    {{ $users->links() }}
                                    <div class="row">

                                        <!--     <ul class="pagination" role="navigation">

                                               <li class="page-item">
                                                <a class="page-link" href="http://127.0.0.1:8000/admin/users?page=1" rel="prev">&laquo; Previous</a>
                                            </li>


                                                    <li class="page-item">
                                                <a class="page-link" href="http://127.0.0.1:8000/admin/users?page=3" rel="next">Next &raquo;</a>
                                            </li>
                                            </ul>-->

                                     <!--   <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_full_numbers"
                                                 id="datatables_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="datatables_previous"><a href="#" aria-controls="datatables"
                                                                                    data-dt-idx="1" tabindex="0"
                                                                                    class="page-link">Prev</a></li>
                                                    <li class="paginate_button page-item next" id="datatables_next"><a
                                                                href="#" aria-controls="datatables" data-dt-idx="6"
                                                                tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>

@endsection