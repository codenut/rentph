<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/app.css" />
    <script type="text/javascript" src="/js/jquery.js" ></script>
  </head>
  <body>
    @include('shared/header')
    <div class="container main-content">
      <div id="error-message" class="alert alert-danger fade in" style="display: none">
        <button type="button" id="close-alert" class="close">&times;</button>
        <div id="messages"></div>
      </div>
      <div class="content">
        <div class="row">
          @include('properties/new')
        </div>
      </div>        
    </div>
  </body>
  <script type="text/javascript" src="/js/bootstrap.js" ></script>
  <script type="text/javascript" src="/js/respond.min.js" ></script>
  <script type="text/javascript" src="/js/app.js" ></script>
</html>
