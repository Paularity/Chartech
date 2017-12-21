<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chartech</title>
    <!-- Compiled CSS  -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  </head>
  <body>
    @include('inc.navbar')

  <div class="container">
    <!-- If Page is Aircraft  -->
    @if( Request::is('aircraft') ? 'active' : '' )
      @include('inc.notification')
        <div class="well col-md-2">
          @yield('dashboard')
        </div>
        <div class="col-md-1"></div>

        <div class="well col-md-9">
          @yield('content')
        </div>
        <!-- End of Aircraft Page Condition  -->

    @else
    @include('inc.notification')
    <div class="row">
      @yield('content')
    </div>
    @endif

    </div>



    <script src="{{ asset('js/app.js') }}"></script>
  </body>

</html>
