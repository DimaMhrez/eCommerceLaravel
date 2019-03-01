
@extends('back_end.main')

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