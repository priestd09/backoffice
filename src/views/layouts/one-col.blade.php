<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <title>{{{Backoffice::title()}}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('packages/aamant/backoffice/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('packages/aamant/backoffice/css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <link href="{{asset('packages/aamant/backoffice/css/backoffice.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="messages">
      @if (Session::has('flash_success'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p>{{{ Session::get('flash_success') }}}</p>
        </div>
      @endif
      @if (Session::Has('flash_info'))
        <div class="alert alert-info">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p>{{{ Session::get('flash_info') }}}</p>
        </div>
      @endif
      @if (Session::Has('flash_warning'))
        <div class="alert alert-warning">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p>{{{ Session::get('flash_warning') }}}</p>
        </div>
      @endif
      @if (Session::Has('flash_danger'))
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p>{{{ Session::get('flash_danger') }}}</p>
        </div>
      @endif
    </div>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url(Config::get('backoffice::base_url'))}}">{{{Backoffice::title()}}} @yield('title')</a>
        </div>
        <div class="navbar-collapse collapse">
          {{Backoffice::menu()->render()}}
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </div>
    
    <div class="container-fluid">
      @yield('content')
    </div>

    <script src="{{asset('packages/aamant/backoffice/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('packages/aamant/backoffice/js/bootstrap.min.js')}}"></script>
    <script>
      +function ($) { "use strict";

        window.setTimeout(function() {
          $("#messages .alert").alert('close')
        }, 7000);
        
        @yield('script')

      }(window.jQuery);
    </script>
  </body>
</html>
