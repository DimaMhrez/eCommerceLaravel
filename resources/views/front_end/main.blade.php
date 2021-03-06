<!doctype html>
<html class="no-js" lang="en">
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="M_Adnan" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Document Title -->
  <title>{{$ourbrand->name}}</title>

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
  <link rel="stylesheet" href="{{ asset('front_end/css/mystyle.css')}}">
@yield('otherCss')

<!-- Fonts Online -->
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">


  <!-- JavaScripts -->
  <script src="{{asset('front_end/js/vendors/modernizr.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
          <li><a href="/about">Store Location </a></li>
          <li><a href="/about">FAQ </a></li>
          <li><a href="/about">Newsletter </a></li>
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
        <form id="researchform" action="search">
            @csrf
          <label for="category"></label>
          <select name="category" id="category" class="selectpicker">
                <option> All Categories</option>
                @foreach ($categories as $category)
                  <option>{{$category->name}}</option>
                @endforeach
              </select>
          <input name="researchstring" id="researchstring" type="search" placeholder="Cerca tra i prodotti...">
          <button class="submit" id="research" type="submit"><i class="icon-magnifier"></i></button>
        </form>
      </div>

      <span id="cartpartcontainer">
      @include('front_end.CartPart')

      </span>
    </div>

    <!-- Nav -->
    <nav class="navbar ownmenu">
      <div class="container">

        <!-- Categories -->
        <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Categorie </a>
          <div class="cate-bar-in">
            <div id="cater" class="collapse">
              <ul>
                @foreach($categories as $category)
                  <li><a href="/search?category={{urlencode($category->name)}}&researchstring=" name="{{$category->name}}" class="catform">{{$category->name}}</a></li>
              @endforeach
              </ul>
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
            @foreach($main_menus as $menu)
              <li> <a href="{{$menu->URL}}">{{$menu->name}} </a></li>
            @endforeach
          </ul>
        </div>

        <!-- NAV RIGHT -->
        <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Supporto:</strong> {{$ourbrand->phoneNumber}}</span> </div>
      </div>
    </nav>
  </header>

@yield('content')  <!-- contenuto principale della pagina -->

  <!-- Newsletter -->
  <section class="newslatter">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Iscriviti alla Newsletter <span>Get <strong>25% di sconto</strong> sul primo acquisto!</span></h3>
        </div>
        <div class="col-md-6">
          <form>
            <input type="email" placeholder="Your email address here...">
            <button type="submit">Iscriviti!</button>
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
        <li><a href="/about"> Chi Siamo </a></li>
        <li><a href="/about"> Servizio Clienti </a></li>
        <li><a href="/about"> Contattaci</a></li>
      </ul>
    </div>
    <div class="row">

      <!-- Contact -->
      <div class="col-md-4">
        <h4>Contattaci!</h4>
        <p>Address: {{$ourbrand->location}}</p>
        <p>Phone: {{$ourbrand->phoneNumber}}</p>
        <p>Email: {{$ourbrand->email}}</p>
      </div>

      <!-- Categories -->
      <div class="col-md-3">
        <h4>Categorie</h4>
        <ul class="links-footer">
          @foreach($categories as $category)
            <li><a href="{{$category->href}}">{{$category->name}}</a></li>
          @endforeach
        </ul>
      </div>

      <!-- Categories -->
      <div class="col-md-3">
        <h4>Servizi per il cliente</h4>
        <ul class="links-footer">
          <li><a href="#.">Spedizioni</a></li>
          <li><a href="#."> Shopping sicuro</a></li>
          <li><a href="#."> Spedizioni internazionali</a></li>
          <li><a href="#."> Affiliati</a></li>
          <li><a href="#."> Contatti </a></li>
        </ul>
      </div>

      <!-- Categories -->
      <div class="col-md-2">
        <h4>Informazioni</h4>
        <ul class="links-footer">
          <li><a href="#.">Il nostro blog</a></li>
          <li><a href="/about"> Chi Siamo</a></li>
          <li><a href="/about"> FAQs</a></li>
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

<!-- End Page Wrapper -->

<!-- JavaScripts -->
<script src="{{asset('front_end/js/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{asset('front_end/js/vendors/wow.min.js') }}"></script>
<script src="{{asset('front_end/js/vendors/bootstrap.min.js') }}"></script>
<script src="{{asset('front_end/js/vendors/own-menu.js') }}"></script>
<script src="{{asset('front_end/js/vendors/jquery.sticky.js') }}"></script>
<script src="{{asset('front_end/js/vendors/owl.carousel.min.js') }}"></script>
<script src="{{asset('front_end/js/vendors/myscripts.js')}}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{asset('front_end/rs-plugin/js/jquery.tp.t.min.js') }}"></script>
<script type="text/javascript" src="{{asset('front_end/rs-plugin/js/jquery.tp.min.js') }}"></script>
<script src="{{asset('front_end/js/main.js') }}"></script>
<script src="{{ asset('front_end/js/vendors/jquery.nouislider.min.js') }}"></script>
@yield('otherScript')

<!-- invocazione logout -->



<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


</script>

</body>
</html>