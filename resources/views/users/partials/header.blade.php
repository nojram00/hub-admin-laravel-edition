<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$title}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @vite(['/resources/sass/app.scss', '/resources/js/app.js'])
  @vite('/resources/css/app.css')

  {{-- @vite(['/css']) --}}

  <!-- Favicons -->
  <link href="/assets/user/img/favicon.png" rel="icon">
  {{-- <link rel="stylesheet" href="{{asset('assets/user/img/favicon.png')}}"> --}}
  <link href="/assets/user/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/user/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/user/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/user/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/user/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!--------JQUERY-------->
  {{-- @vite(['resources/js/app.js']) --}}

  <!-- Template Main CSS File -->
  <link href="/assets/user/css/style.css" rel="stylesheet">

  <script src="{{asset('assets/js/jquery.js')}}"></script>
  <script type="text/javascript">

        $(document).ready(function (){
            var prList = $("#products-navbar")
            console.log(prList);

                if(prList.firstChild){
                    prList.removeChild(prList.firstChild);
                }

            $.get('/viewCategories', function(data){
                console.log("ajax data: ",data)
                data.forEach((d) => {
                    var navList = $('<li>');
                    navList.html(`<a href='/products/${d.id}' class="text-uppercase">${d.category_name}</a>`);
                    navList.appendTo(prList);
                });
                })
        })



  </script>

  <!-- =======================================================
  * Template Name: eBusiness
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <header id="header" class="fixed-top d-flex align-items-center" style="min-width: 100vw">
        <div class="container d-flex justify-content-between">

          <div class="logo flex flex-col">
            <h1><a href="/"><span>Q-</span>HUB</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            {{-- <a href="index.html"><img src="/assets/user/img/logo.png" alt="q-hub" class="img-fluid"></a> --}}
          </div>

          {{-- Navbar --}}
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="/#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="/#about">About</a></li>
              {{-- <li><a class="nav-link scrollto" href="#services">Services</a></li> --}}
              {{-- <li><a class="nav-link scrollto" href="#portfolio">Quote your PC</a></li> --}}
              {{-- <li><a class="nav-link scrollto" href="#team">Team</a></li> --}}
              {{-- <li><a href="blog.html">Blog</a></li> --}}
              <li class="dropdown"><a href=""><span>Service</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li class="dropdown"><a href=""><span>Quote your PC</span><i class="bi bi-chevron-right"></i></a>
                        <ul>
                            <li><a href="/quotations/1">Intel Build</a></li>
                            <li><a href="/quotations/2">AMD Build</a></li>
                        </ul>
                    </li>
                  <li class="dropdown"><a href="#"><span>Products</span> <i class="bi bi-chevron-right"></i></a>
                    <ul id="products-navbar">
                      {{-- <li><a href="#">Deep Drop Down 1</a></li>
                      <li><a href="#">Deep Drop Down 2</a></li>
                      <li><a href="#">Deep Drop Down 3</a></li>
                      <li><a href="#">Deep Drop Down 4</a></li>
                      <li><a href="#">Deep Drop Down 5</a></li> --}}
                    </ul>
                  </li>
                </ul>
              </li>
                <li class="dropdown"><a href="#contact"><span>Contact</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="">Facebook</a></li>
                    </ul>
                </li>
                @auth
                    <li class="dropdown">
                        <a href=""><span>{{Auth::user()->name}}</span><i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="m-3">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <input type="submit" value="Logout" class="nav-link scrollto" style="border: none; background: none; padding: 0; cursor: pointer;">
                                </form>
                            </li> --}}

                            <li><a href="#" id="logout">Logout</a></li>
                            <form action="/logout" id="logout-form" method="POST">
                                @csrf
                            </form>
                            <li><a href="My Quotations"><span>My Quotations</span></a></li>
                            @if (Auth::user()->user_role_id == 2) <!--- Check if it is admin -->

                            <!-- Pag Admin, lalabas tong Option --->
                                <li>
                                    <a href="/dashboard/main">
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endauth
                @guest
                    <li><a href="/auth/login" class="nav-link scrollto">Login</a></li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->
