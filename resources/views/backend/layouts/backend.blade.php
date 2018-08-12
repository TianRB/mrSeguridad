<html lang="en" class="perfect-scrollbar-off">
 <head>
     <meta charset="utf-8">
     <link rel="icon" type="image/png" href="../assets/img/favicon.png">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <title>ESNEA</title>
     <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
     <!-- CSS Files -->
     @include('backend.layouts.styles')
     @yield('page_styles')
 </head>
 <body class="sidebar-mini">
  <div class="wrapper">
   @include('backend.layouts.sidebar')
   <div class="main-panel">
    @yield('content')
   </div>
  </div>
  @include('backend.layouts.scripts')
  @yield('page_scripts')
 </body>
</html>

{{--<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ url('img/casa-ralero-icon.png') }}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App Title -->
    <title>Simplest</title>

    <!-- Styles -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Backend Dashboard -->
    <link rel="stylesheet" href="{{ asset('css/bicefalo_dashboard.css') }}">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
  <div id="app">

      @yield('content')

  </div>

  <!-- Scripts -->

  <!-- Backend Dashboard -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
--}}
