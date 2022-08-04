<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="/css/prism.css">

  @yield('third_party_stylesheets')

  @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-danger">Chiqish</button>
        </form>
      </ul>
    </nav>
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="container">
        <section class="content">
          @yield('content')
        </section>
        <div class="pb-4"></div>
      </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; {{ date('Y') }} Elbek Khamdullaev
    </footer>
  </div>

  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="/js/prism.js"></script>
  @yield('tinyconf')
  @yield('third_party_scripts')

  @stack('page_scripts')
</body>

</html>