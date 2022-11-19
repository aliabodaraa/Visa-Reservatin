<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Visa</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <style>
      a{
        text-decoration: none;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
    .Active{
        border-radius: 5px;
        color: black;
        background-color:#6c757d;
        border-color: #6c757d;
    }
    body > header > div > div > ul > li:hover{
        border-radius: 5px;
        color: black;
        background-color: #ffffff2b;
    }
    ul.nav>li{
        margin-left: 3px;
        }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        #logout{
            position: relative;
            left: 30%;
        }
      }
      @media (max-width: 768px) {
       ul.nav>li{
        height: 38px;
        font-size: 12px;
        }
        #logout{
            position: relative;
            left: 14%;
        }
      }

      .float-right {
        float: right;
      }





    </style>

    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/form.css') !!}" rel="stylesheet">

</head>
<body>

    @include('layouts.partials.navbar')

    <main class="container mt-5">
        @yield('content')
    </main>


    @section("scripts")
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>{{-- for use js in bootstrap like collapse --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"> </script>{{-- for use jQuery --}}
    {{-- the next sourses get all countries wappered in select then you can access them  via window.intlTelInput(element,..) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>{{-- css for countries --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>{{-- get all countries in the world --}}
    {{-- the previous sourses get all countries wappered in select then you can access them  via window.intlTelInput(element,..) --}}

    <script src="{!! url('assets/js/countriesApi.js') !!}"></script>

    <script src="{!! url('assets/js/searchFiltering.js') !!}"></script>
    <script src="{!! url('assets/js/clickKeyupEvents.js') !!}"></script>

    <script src="{!! url('assets/js/datesTimesConstrants.js') !!}"></script>
    <script src="{!! url('assets/js/form.js') !!}"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"> </script> --}}
    

    @show
  </body>
</html>
