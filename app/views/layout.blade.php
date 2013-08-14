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
      @if(isset($errors) && $errors->has('auth_failed'))
      <div id="error-message" class="alert alert-danger fade in" >
        <button type="button" id="close-alert" class="close">&times;</button>
        <div id="messages">
          {{ $errors->first('auth_failed') }}
        </div>
      </div>
      @endif
      <div class="row">
        @yield('content')
      </div>
    </div>
    <div class="modal fade" id="ajax-modal" tabindex="-1" role="dialog"  aria-hidden="true">
      <div id="modal-dialog">

      </div>
    </div>
  </body>
  {{ HTML::script('js/bootstrap.js') }}
  {{ HTML::script('js/app.js') }}
  {{ HTML::script('js/jquery.simplePagination.js') }}
  {{ HTML::script('js/bootstrap-datepicker.js') }}
</html>
