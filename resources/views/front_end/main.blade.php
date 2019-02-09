<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="M_Adnan" />
<!-- Document Title -->
<title>Smart Tech eCommerce</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('front_end/images/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('front_end/images/favicon.ico') }}" type="image/x-icon">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ asset('front_end/rs-plugin/css/settings.css') }}" media="screen" />

<!-- StyleSheets -->
<link rel="stylesheet" href="{{ asset('front_end/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front_end/css/responsive.css') }}">
@yield('otherCss')

<!-- Fonts Online -->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">


<!-- JavaScripts -->
<script src="{{asset('front_end/js/vendors/modernizr.js') }}"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<!-- Page Wrapper -->
<div id="wrap" class="layout-1"> 
  
  <!-- Top bar -->
  <div class="top-bar">
    <div class="container">
      <p>Welcome to SmartTech center!</p>
      <div class="right-sec">
        <ul>
          <li><a href="#.">Store Location </a></li>
          <li><a href="#.">FAQ </a></li>
          <li><a href="#.">Newsletter </a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @guest
            <li><a href="{{ route('login') }}">Login</a></li>  <!-- vanno aggiornate quando si sistema il routing -->
            <li><a href="{{url('register')}}">Register</a></li> <!-- IDEM -->
          @else
            <li><a href="#.">My Profile</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a></li>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          @endauth
        </ul>
        <div class="social-top"> <a href="#."><i class="fa fa-facebook"></i></a> <a href="#."><i class="fa fa-twitter"></i></a> <a href="#."><i class="fa fa-linkedin"></i></a> <a href="#."><i class="fa fa-dribbble"></i></a> <a href="#."><i class="fa fa-pinterest"></i></a> </div>
      </div>
    </div>
  </div>
  
  <!-- Header -->
  <header>
    <div class="container">
      <div class="logo"> <a href="{{ url('/') }}"><img src="{{ asset('front_end/images/logo.png') }}" alt="" ></a> </div>
      <div class="search-cate">
        <select class="selectpicker">
          <option> All Categories</option>
          @foreach ($categories as $category)
            <option>{{$category->name}}</option>
          @endforeach
        </select>
        <input type="search" placeholder="Search entire store here...">
        <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
      </div>
      
      <!-- Cart Part -->
      <ul class="nav navbar-right cart-pop">

          </ul>
        </li>
      </ul>
    </div>
    
    <!-- Nav -->
    <nav class="navbar ownmenu">
      <div class="container"> 

        <!-- Categories -->
        <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Our Categories </a>
          <div class="cate-bar-in">
            <div id="cater" class="collapse">
              <ul>
                @foreach($categories as $category)
                <li><a href="{{$category->href}}">{{$category->name}}</a></li>
                @endforeach

                  <!-- Qui ci sono i sottomenu -->
                  <!-- <li class="sub-menu"><a href="#."> Cell Phones & Accessories</a>
                    <ul>
                      <li><a href="#."> TV & Video</a></li>
                      <li><a href="#."> Camera, Photo & Video</a></li>
                      <li><a href="#."> Cell Phones & Accessories</a>
                    </ul>

                </ul> -->
            </div>
          </div>
        </div>
        
        <!-- Navbar Header -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
        </div>
        <!-- NAV -->
        <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">



            <!-- Mega Menu Nav -->
           <!-- <li class="dropdown megamenu"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown">Mega menu </a>
              <div class="dropdown-menu animated-2s fadeInUpHalf">
                <div class="mega-inside">
                  <div class="top-lins">
                    <ul>
                      <li><a href="#."> Cell Phones & Accessories </a></li>
                      <li><a href="#."> Carrier Phones </a></li>
                      <li><a href="#."> Unlocked Phones </a></li>
                      <li><a href="#."> Prime Exclusive Phones </a></li>
                      <li><a href="#."> Accessories </a></li>
                      <li><a href="#."> Cases </a></li>
                      <li><a href="#."> Best Sellers </a></li>
                      <li><a href="#."> Deals </a></li>
                      <li><a href="#."> All Electronics </a></li>
                    </ul>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6>Electronics</h6>
                      <ul>
                        <li><a href="#."> Cell Phones & Accessories </a></li>
                        <li><a href="#."> Carrier Phones </a></li>
                        <li><a href="#."> Unlocked Phones </a></li>
                        <li><a href="#."> Prime Exclusive Phones </a></li>
                        <li><a href="#."> Accessories </a></li>
                        <li><a href="#."> Cases </a></li>
                        <li><a href="#."> Best Sellers </a></li>
                        <li><a href="#."> Deals </a></li>
                        <li><a href="#."> All Electronics </a></li>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <h6>Computers</h6>
                      <ul>
                        <li><a href="#."> Computers & Tablets</a></li>
                        <li><a href="#."> Monitors</a></li>
                        <li><a href="#."> Laptops & tablets</a></li>
                        <li><a href="#."> Networking</a></li>
                        <li><a href="#."> Drives & Storage</a></li>
                        <li><a href="#."> Computer Parts & Components</a></li>
                        <li><a href="#."> Printers & Ink</a></li>
                        <li><a href="#."> Office & School Supplies </a></li>
                      </ul>
                    </div>
                    <div class="col-sm-2">
                      <h6>Home Appliances</h6>
                      <ul>
                        <li><a href="#."> Refrigerators</a></li>
                        <li><a href="#."> Wall Ovens</a></li>
                        <li><a href="#."> Cooktops & Hoods</a></li>
                        <li><a href="#."> Microwaves</a></li>
                        <li><a href="#."> Dishwashers</a></li>
                        <li><a href="#."> Washers</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-4"> <img class=" nav-img" src="{{ asset('front_end/images/navi-img.png') }}" alt="" > </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="dropdown"> <a href="blog.html" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
              <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                <li><a href="Blog.html">Blog </a></li>
                <li><a href="Blog_details.html">Blog Single </a></li>
              </ul>
            </li> -->
              @foreach($menus as $menu)
            <li> <a href="{{$menu->URL}}">{{$menu->name}} </a></li>
              @endforeach
          </ul>
        </div>
        
        <!-- NAV RIGHT -->
        <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Supporto:</strong> (123) 4567</span> </div>
      </div>
    </nav>
  </header>

    @yield('content')  <!-- contenuto principale della pagina -->

    <!-- Newsletter -->
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
          <p>Address: Luogo</p>
          <p>Phone: Numero</p>
          <p>Email: Email</p>
          <div class="social-links"> <a href="#."><i class="fa fa-facebook"></i></a> <a href="#."><i class="fa fa-twitter"></i></a> <a href="#."><i class="fa fa-linkedin"></i></a> <a href="#."><i class="fa fa-pinterest"></i></a> <a href="#."><i class="fa fa-instagram"></i></a> <a href="#."><i class="fa fa-google"></i></a> </div>
        </div>
        
        <!-- Categories -->
        <div class="col-md-3">
          <h4>Categories</h4>
          <ul class="links-footer">
            @foreach($categories as $category)
              <li><a=href="{{$category->href}}">{{$category->name}}</li>
            @endforeach
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
        <div class="col-sm-6 text-right"> <img src="{{ asset('front_end/images/card-icon.png') }}" alt=""> </div>
      </div>
    </div>
  </div>
  
  <!-- End Footer --> 
  
  <!-- GO TO TOP  --> 
  <a href="#" class="cd-top" id="pippo"><i class="fa fa-angle-up"></i></a>
  <!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="{{asset('front_end/js/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{asset('front_end/js/vendors/wow.min.js') }}"></script>
<script src="{{asset('front_end/js/vendors/bootstrap.min.js') }}"></script>
<script src="{{asset('front_end/js/vendors/own-menu.js') }}"></script>
<script src="{{asset('front_end/js/vendors/jquery.sticky.js') }}"></script>
<script src="{{asset('front_end/js/vendors/owl.carousel.min.js') }}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{asset('front_end/rs-plugin/js/jquery.tp.t.min.js') }}"></script>
<script type="text/javascript" src="{{asset('front_end/rs-plugin/js/jquery.tp.min.js') }}"></script>
<script src="{{asset('front_end/js/main.js') }}"></script>
<script src="{{ asset('front_end/js/vendors/jquery.nouislider.min.js') }}"></script>
@yield('otherScript')

<!-- invocazione logout -->
<script>
  function prova() {
    alert("ciao");
  }
</script>
</body>
</html>