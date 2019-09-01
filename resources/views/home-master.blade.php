<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/home-asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/home-asset/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/home-asset/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/home-asset/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/home-asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/home-asset/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="/home-asset/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/home-asset/css/style.css" rel="stylesheet">
  <style type="text/css">
    .berita-single {
      box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
      padding: 30px;
    }

    .berita-single h4 a {
      color: #0c2e8a;;
    }
  </style>
  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h4><a href="#body" class="scrollto">Beasiswa</h4>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{ url()->current() == url('/') ? 'menu-active' : '' }}"><a href="/">Beranda</a></li>
          <li class="{{ url()->current() == url('berita') ? 'menu-active' : '' }}"><a href="/berita">Berita</a></li>
          <li class="{{ url()->current() == url('login') ? 'menu-active' : '' }}"><a href="/login">Login</a></li>
          <li class="{{ url()->current() == url('register') ? 'menu-active' : '' }}"><a href="/register">Register</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  @yield('content')

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Reveal</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="/home-asset/lib/jquery/jquery.min.js"></script>
  <script src="/home-asset/lib/jquery/jquery-migrate.min.js"></script>
  <script src="/home-asset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/home-asset/lib/easing/easing.min.js"></script>
  <script src="/home-asset/lib/superfish/hoverIntent.js"></script>
  <script src="/home-asset/lib/superfish/superfish.min.js"></script>
  <script src="/home-asset/lib/wow/wow.min.js"></script>
  <script src="/home-asset/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="/home-asset/lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="/home-asset/lib/sticky/sticky.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="/home-asset/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="/home-asset/js/main.js"></script>

</body>
</html>
