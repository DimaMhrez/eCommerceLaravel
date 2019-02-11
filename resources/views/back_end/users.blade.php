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
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <div class="dataTables_wrapper dt-bootstrap4" id="tables_wrapper">
                                    <table class="table table-bordered" id="users-table">
                                        <thead>
                                        <tr>
                                            <th>Id num</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                          <!--  <th>Actions</th> -->
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
                ajax: '{!! route('datatables.data') !!}',

                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    /*{ data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },*/
                ]

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#users-table').DataTable();

            $('#users-table tbody').on( 'click', 'tr', function () {

                //deselezione riga
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }

                //selzione riga
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                }
            } );

        } );

    </script>
@endpush