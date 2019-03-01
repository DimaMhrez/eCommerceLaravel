@extends('back_end.main')


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
                            <h4 class="card-title">Services </h4>

                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <div class="dataTables_wrapper dt-bootstrap4" id="tables_wrapper">
                                    <table class="table table-striped table-no-bordered table-hover"
                                           id="users-table" cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                        <button class="btn btn-primary btn-sm" href="{{url('/admin/permission/create')}}">New<div class="ripple-container"></div></button>
                                        <tr>
                                            <th>Id num</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                            <!-- <th>Actions</th> -->
                                            <!-- <th>Created At</th>
                                            <th>Updated At</th> -->
                                        </tr>
                                        </thead>
                                    </table>
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


            @push('scripts')
                <script>
                    $(function() {
                        $('#users-table').DataTable({
                            lengthMenu: [
                                [10, 25, 50, 100, -1],
                                [10, 25, 50, 100, "All"]
                            ],
                            processing: true,
                            serverSide: true,
                            ajax: '{!! route('permissions.data') !!}',

                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'name', name: 'name' },
                                { data:'intro', name:'intro'}





                                /* MY COLUMN
                                {defaultContent: '<td class="text-right">\n' +
                                        '                            <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>\n' +
                                        '                            <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>\n' +
                                        '                            <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>\n' +
                                        '                          </td>'},
                                /*{ data: 'created_at', name: 'created_at' },
                                { data: 'updated_at', name: 'updated_at' },*/
                            ],




                        });
                    });
                </script>
                <script>
                    /*

                     $(document).ready(function () {
                         var table = $('#users-table').DataTable();


                         //row click , this function get back user's ID , and viewer can't alter the ID
                         $('#users-table').on('click', 'tr', function () {
                             let id = table.row(this).id();

                             return id;

                             //  alert( 'Clicked row id '+id );
                         });
                     });*/
                </script>
    @endpush