<!DOCTYPE HTML>
<html>
  <head>
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/app.css') }}
    {{ HTML::style('css/datepicker.css')}}
    {{ HTML::style('css/simplePagination.css')}}
    {{ HTML::script('js/jquery.js' )}}
  </head>
  <body>
    @include('shared/header')
    <div class="container main-content">
      <div id="error-message" class="alert alert-danger fade in" style="display: none">
        <button type="button" id="close-alert" class="close">&times;</button>
        <div id="messages"></div>
      </div>
      <div class="row">
        @yield('content')
      </div>
    </div>
  </body>
  {{ HTML::script('js/bootstrap.js') }}
  {{ HTML::script('js/app.js') }}
  {{ HTML::script('js/jquery.simplePagination.js') }}
  {{ HTML::script('js/bootstrap-datepicker.js') }}
</html>
