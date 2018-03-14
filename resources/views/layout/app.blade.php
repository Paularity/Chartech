<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chartech</title>
    <!-- Compiled CSS  -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    @include('inc.navbar')
<div id='app'></div>
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

<div id="footer">
  Copyright 2017-2018 by Chartech. All Rights Reserved.
</div>

  </body>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>
