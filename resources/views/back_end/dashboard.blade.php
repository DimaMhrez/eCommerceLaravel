
@extends('back_end.main')

@section('title','Administration Dashboard')

@section('content')

  <div class="content">
    <div class="container-fluid">

      <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->

      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">weekend</i>
              </div>
              <p class="card-category">Order in preparation</p>
              <h3 class="card-title">{{$inPreparation->count()}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> NOW!
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">equalizer</i>
              </div>
              <p class="card-category">Ordered today</p>
              <h3 class="card-title">{{$orderedToday->count}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Today
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Recently Shipped</p>
              <h3 class="card-title">{{$completed->count}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 7 days
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-text card-header-warning">
              <div class="card-text">
                <h4 class="card-title">Few stocks remaining</h4>
                <p class="card-category">Last {{count($productFinishing)}} of {{ $countFinishing }} product with low availability</p>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                <tr><th>ID</th>
                  <th>Name</th>
                  <th>Actions</th>
                </tr></thead>
                <tbody>
                @foreach($productFinishing as $p)
                  <tr id="{{$p->id}}">
                    <td><a href="{{url('/admin/product/'.$p->id.'/edit')}}">{{$p->id}}</a></td>
                    <td>{{$p->name}}</td>
                    <td><a href="{{url('admin/product/'.$p->id.'/addStock')}}" class="btn btn-link btn-warning btn-just-icon remove"><i class="material-icons">add</i><div class="ripple-container"></div></a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-text card-header-success">
              <div class="card-text">
                <h4 class="card-title">Products ShowCase</h4>
                <p class="card-category">There are {{$countCarousel}} Products in home's carousel</p>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                <tr><th>ID</th>
                  <th>Name</th>
                  <th>Actions</th>
                </tr></thead>
                <tbody>
                @foreach($productCarousel as $p)
                  <tr id="{{$p->id}}">
                    <td><a href="{{url('/admin/product/'.$p->id.'/edit')}}">{{$p->id}}</a></td>
                    <td>{{$p->name}}</td>
                    <td><a href="{{url('/admin/product/'.$p->id.'/removeShowcase')}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i><div class="ripple-container"></div></a></td>
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

@endsection

@push('scripts')
  <script>
    $(document).ready(function(){
      $(".nav-item, .active").removeClass("active");
      $("#dashboard").parent().addClass("active");
    });


  </script>
@endpush