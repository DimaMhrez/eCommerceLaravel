@extends('front_end.main')

@section('content')

  <!-- Products -->
    <section class="padding-top-40 padding-bottom-60">
      <div class="container">
        <div class="row"> 
          
          <!-- Shop Side Bar -->
          <div class="col-md-3">
            <div class="shop-side-bar"> 
              
              <!-- Categories -->
      <form id="filter" action="/filter" method="POST">
        @csrf
               <h6>Categorie</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  @foreach($data['category'] as $category)
                  <li>
                    <input name="category[]" form="filter" id="cat-{{$category->id}}" value="{{$category->id}}" class="styled" type="checkbox" >
                    <label for="cat-{{$category->id}}"> {{$category->name}} </label>
                  </li>
                 @endforeach
                </ul>
              </div>
              
              <!-- Featured Brands -->
              <h6>Brand in vetrina</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  @foreach($data['brands'] as $brand)
                  <li>
                    <input name="brand[]" form="filter" id="brand-{{$brand->id}}" value="{{$brand->id}}" class="styled" type="checkbox" >
                    <label for="brand-{{$brand->id}}"> {{$brand->name}} </label>
                  </li>
                  @endforeach
                    <input type="submit" form="filter" value="Filter" class="btn-round">
                </ul>
              </div>

      </form>
              <!-- Colors -->

              <!-- Colors -->

            </div>
          </div>

          <!-- Products -->
        <div id="filtercontainer">
            @include('front_end.FilterList')

        </div>
        </div>
      </div>
    </section>
    


  <!-- End Content --> 

  <!-- GO TO TOP  --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 

<!-- End Page Wrapper --> 

<script>
jQuery(document).ready(function($) {
  
  //  Price Filter ( noUiSlider Plugin)
    $("#price-range").noUiSlider({
    range: {
      'min': [ 0 ],
      'max': [ 1000 ]
    },
    start: [40, 940],
        connect:true,
        serialization:{
            lower: [
        $.Link({
          target: $("#price-min")
        })
      ],
      upper: [
        $.Link({
          target: $("#price-max")
        })
      ],
      format: {
      // Set formatting
        decimals: 2,
        prefix: '$'
      }
        }
  })
})

</script>



@endsection