<!DOCTYPE html>
<html>
  <head>
    @include('includes.head')
    <!-- Javascripts-->
    <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </head>
  
  <body class="sidebar-mini fixed">
    <div class="wrapper">

      <header class="main-header hidden-print"><a class="logo" href="{{ url('/') }}">Reservasi <span style="font-weight: 700">Parkir</span></a>
        @include('includes.header')
      </header>

      <aside class="main-sidebar hidden-print">
        @if (Auth::guard('admin')->check())
            @include('includes.sidebar-admin')
        @else
            @include('includes.sidebar-member')
        @endif
      </aside>

        <div class="content-wrapper"> <!-- Start Content -->
            @yield('content')
        </div>
    </div>
  </body>
</html>