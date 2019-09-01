<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>@yield('title')</title>
    <!-- Icons-->
    <link rel="icon" type="image/ico" href="./img/favicon.ico" sizes="any" />
    <link href="/node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="/node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/node_modules/chart.js/dist/Chart.min.js"></script>
    <script>

      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav d-md-down-none">
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
          <a class="nav-link" href="#">
            
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link mr-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="" alt="{{ Auth::user()->role == 2 ? Auth::user()->mahasiswa->nama : 'Admin' }}">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
              <strong>Akun</strong>
            </div>
            @if(Auth::user()->role == 2)
            <a class="dropdown-item" href="/m/profil">
              <i class="fa fa-user"></i> Profile</a>
              @endif
              <a id="logout-button" class="dropdown-item" type="submit">
              <i class="fa fa-lock"></i> Logout</a>
              <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
              </form>
              <script>
                var logoutButton = document.getElementById('logout-button');
                var logoutForm = document.getElementById('logout-form');
                logoutButton.addEventListener('click', function(e) {
                  e.preventDefault();
                  logoutForm.submit();
                });
              </script>
          </div>
        </li>
      </ul>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          @yield('sidebar')
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <!-- /.row-->
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-5">
                    <h4 class="card-title mb-0">@yield('content-title')</h4>
                  </div>
                  <!-- /.col-->
                  <!-- /.col-->
                </div>
                <!-- /.row-->
                <div class="mt-3">
                  @yield('content')
                </div>
              </div>
            </div>
            <!-- /.row-->
          </div>
        </div>
      </main>
    </div>
    <footer class="app-footer">
      <div>
        <a href="https://coreui.io">CoreUI</a>
        <span>&copy; 2018 creativeLabs.</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    
    <script src="/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/node_modules/pace-progress/pace.min.js"></script>
    <script src="/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="/node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>
