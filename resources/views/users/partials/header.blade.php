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

  <!-- Template Main CSS File -->
  <link href="/assets/user/css/style.css" rel="stylesheet">

  <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function() {
                // var prList = document.querySelectorAll('#products-navbar')
                var prList = document.getElementById('products-navbar')
                console.log(prList);

                if(prList.firstChild){
                    prList.removeChild(prList.firstChild);
                }

                fetch('/viewCategories').then((res) => {
                    return res.json();
                }).then((data) => {
                    // console.log(data);
                    data.forEach((d) => {
                        var navList = document.createElement('li');
                        navList.innerHTML = `<a href=/products/${d.id} class="text-uppercase">${d.category_name}</a>`
                        prList.appendChild(navList)
                        // console.log(d)
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
    <header id="header" class="fixed-top d-flex align-items-center">
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
                            <li><a href="/quotations/1">Intel Processors</a></li>
                            <li><a href="/quotations/2">AMD Processors</a></li>
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
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </header><!-- End Header -->
