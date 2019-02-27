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
              <h6>Categorie</h6>
              <div class="checkbox checkbox-primary">
                <ul>
                  @foreach($data['category'] as $category)
                  <li>
                    <input id="cate1" class="styled" type="checkbox" >
                    <label for="cate1"> {{$category->name}} </label>
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
                    <input id="{{$brand->id}}" class="styled" type="checkbox" >
                    <label for="{{$brand->id}}"> {{$brand->name}} </label>
                  </li>
                  @endforeach
                    <a href="#." class="btn-round" >Filter</a>
                </ul>
              </div>


              <!-- Colors -->

              <!-- Colors -->

            </div>
          </div>

          <!-- Products -->
          <div class="col-md-9"> 
            
            <!-- Short List -->
            <div class="short-lst">
              <h2>Tutti i prodotti</h2>
              <ul>
                <!-- Short List -->
                <li>
                  <p>Totale: {{$data['productsnumber']}} risultati</p>
                </li>
              </ul>
            </div>
            
            <!-- Items -->
            <div class="col-list">

              @foreach($data['products'] as $product)
              <!-- Product -->
              <div class="product">
                <article>                   
                  <!-- Product img -->
                  <div class="media-left">
                    <div class="item-img"> <img class="img-responsive" src="" alt="" >  </div>
                  </div>                  
                  <!-- Content -->
                  <div class="media-body">
                    <div class="row">                       
                      <!-- Content Left -->
                      <div class="col-sm-7"> <span class="tag">{{$product->category}}</span> <a href="/{{$product->id}}" class="tittle">{{$product->name}}</a>
                        <!-- Reviews -->
                        @if (!empty($product->rate))
                          <p class="rev">@for($i=0; $i<$product->rate && $i<5; ++$i)<i class="fa fa-star"></i></i>@endfor @for(;$i<5;++$i)<i class="fa fa-star-o"></i> @endfor <span class="margin-left-10"></span></p>
                        @else <p class="rev"><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
                        @endif

                        <ul class="bullet-round-list">
                          @foreach($data['bullets'] as $bullet)
                            @if($bullet->product_id == $product->id)
                          <li>{{$bullet->description}}</li>
                            @endif
                          @endforeach
                        </ul>
                      </div>                      
                      <!-- Content Right -->
                      <div class="col-sm-5 text-center"> <a href="#." class="heart"><i class="fa fa-heart"></i></a>
                        <div class="position-center-center">
                          <div class="price">€{{$product->normalPrice}}</div>
                          <p>Disponibilità: <span class="in-stock">In stock</span></p>
                          <a href="/products/{{$product->id}}" class="btn-round"><i class="icon-basket-loaded"></i> Vai al prodotto</a> </div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
              @endforeach
              
              <!-- pagination
              <ul class="pagination">
                <li> <a href="#" aria-label="Previous"> <i class="fa fa-angle-left"></i> </a> </li>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li> <a href="#" aria-label="Next"> <i class="fa fa-angle-right"></i> </a> </li>
                -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Your Recently Viewed Items -->
    <section class="padding-bottom-60">
      <div class="container"> 
        
        <!-- heading -->
        <div class="heading">
          <h2>Your Recently Viewed Items</h2>
          <hr>
        </div>
        <!-- Items Slider -->
        <div class="item-slide-5 with-nav"> 
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/item-img-1-1.jpg" alt="" >
              <!-- Content --> 
              <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7 Perfect For Playing Game</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00 </div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/item-img-1-2.jpg" alt="" > <span class="sale-tag">-25%</span>
              
              <!-- Content --> 
              <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00 <span>$200.00</span></div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/item-img-1-3.jpg" alt="" >
              <!-- Content --> 
              <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/item-img-1-4.jpg" alt="" > <span class="new-tag">New</span>
              
              <!-- Content --> 
              <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/item-img-1-5.jpg" alt="" >
              <!-- Content --> 
              <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/item-img-1-6.jpg" alt="" > <span class="sale-tag">-25%</span>
              
              <!-- Content --> 
              <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00 <span>$200.00</span></div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/item-img-1-7.jpg" alt="" >
              <!-- Content --> 
              <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
          
          <!-- Product -->
          <div class="product">
            <article> <img class="img-responsive" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/item-img-1-8.jpg" alt="" > <span class="new-tag">New</span>
              
              <!-- Content --> 
              <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a> 
              <!-- Reviews -->
              <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
              <div class="price">$350.00</div>
              <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Clients img -->
    <section class="light-gry-bg clients-img">
      <div class="container">
        <ul>
          <li><img src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/c-img-1.png" alt="" ></li>
          <li><img src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/c-img-2.png" alt="" ></li>
          <li><img src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/c-img-3.png" alt="" ></li>
          <li><img src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/c-img-4.png" alt="" ></li>
          <li><img src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/images/c-img-5.png" alt="" ></li>
        </ul>
      </div>
    </section>
    
    <!-- Newslatter -->
    <section class="newslatter">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Subscribe our Newsletter <span>Get <strong>25% Off</strong> first purchase!</span></h3>
          </div>
          <div class="col-md-6">
            <form>
              <input type="email" placeholder="Your email address here...">
              <button type="submit">Subscribe!</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- End Content --> 
  
  <!-- Footer -->
  <footer>
    <div class="container"> 
      
      <!-- Footer Upside Links -->
      <div class="foot-link">
        <ul>
          <li><a href="#."> About us </a></li>
          <li><a href="#."> Customer Service </a></li>
          <li><a href="#."> Privacy Policy </a></li>
          <li><a href="#."> Site Map </a></li>
          <li><a href="#."> Search Terms </a></li>
          <li><a href="#."> Advanced Search </a></li>
          <li><a href="#."> Orders and Returns </a></li>
          <li><a href="#."> Contact Us</a></li>
        </ul>
      </div>
      <div class="row"> 
        
        <!-- Contact -->
        <div class="col-md-4">
          <h4>Contact SmartTech!</h4>
          <p>Address: 45 Grand Central Terminal New York, NY 1017
            United State USA</p>
          <p>Phone: (+100) 123 456 7890</p>
          <p>Email: Support@smarttech.com</p>
          <!-- Social Links -->
          <div class="social-links"> <a href="#."><i class="fa fa-facebook"></i></a> <a href="#."><i class="fa fa-twitter"></i></a> <a href="#."><i class="fa fa-linkedin"></i></a> <a href="#."><i class="fa fa-pinterest"></i></a> <a href="#."><i class="fa fa-instagram"></i></a> <a href="#."><i class="fa fa-google"></i></a> </div>
        </div>
        
        <!-- Categories -->
        <div class="col-md-3">
          <h4>Categories</h4>
          <ul class="links-footer">
            <li><a href="#.">Home Audio & Theater</a></li>
            <li><a href="#."> TV & Video</a></li>
            <li><a href="#."> Camera, Photo & Video</a></li>
            <li><a href="#."> Cell Phones & Accessories</a></li>
            <li><a href="#."> Headphones</a></li>
            <li><a href="#."> Video Games</a></li>
            <li><a href="#."> Bluetooth & Wireless</a></li>
          </ul>
        </div>
        
        <!-- Categories -->
        <div class="col-md-3">
          <h4>Customer Services</h4>
          <ul class="links-footer">
            <li><a href="#.">Shipping & Returns</a></li>
            <li><a href="#."> Secure Shopping</a></li>
            <li><a href="#."> International Shipping</a></li>
            <li><a href="#."> Affiliates</a></li>
            <li><a href="#."> Contact </a></li>
          </ul>
        </div>
        
        <!-- Categories -->
        <div class="col-md-2">
          <h4>Information</h4>
          <ul class="links-footer">
            <li><a href="#.">Our Blog</a></li>
            <li><a href="#."> About Our Shop</a></li>
            <li><a href="#."> Secure Shopping</a></li>
            <li><a href="#."> Delivery infomation</a></li>
            <li><a href="#."> Store Locations</a></li>
            <li><a href="#."> FAQs</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- Rights -->
  <div class="rights">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p>Copyright © 2017 <a href="#." class="ri-li"> SmartTech </a>HTML5 template. All rights reserved</p>
        </div>
        <div class="col-sm-6 text-right"> <img src="images/card-icon.png" alt=""> </div>
      </div>
    </div>
  </div>
  
  <!-- End Footer --> 
  
  <!-- GO TO TOP  --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 

<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/js/vendors/jquery/jquery.min.js"></script>
<script src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/js/vendors/wow.min.js"></script>
<script src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/js/vendors/bootstrap.min.js"></script>
<script src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/js/vendors/own-menu.js"></script>
<script src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/js/vendors/jquery.sticky.js"></script>
<script src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/js/vendors/owl.carousel.min.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/rs-plugin/js/jquery.tp.t.min.js"></script>
<script type="text/javascript" src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/rs-plugin/js/jquery.tp.min.js"></script>
<script src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/js/main.js"></script>
<script src="../../../../../../Users/Andrea/Desktop/Uni/Template/main-files/html/js/vendors/jquery.nouislider.min.js"></script>
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