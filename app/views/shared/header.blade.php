<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a href="{{ URL::to('/') }}" class="navbar-brand">Rentph</a>
      @if(Auth::check()) 
      <div class="nav-collapse collapse">
        <ul class="nav navbar-nav">
          <li>
          <a href="{{ URL::to('properties/index') }}">Listings</a>
          </li>
          <li>
          <a href="{{ URL::to('properties/new') }}">Post Property</a>
          </li>
        </ul>
      </div>
      @endif
      <div class="nav-collapse collapse pull-right btn-group">
        @if(Auth::check()) 
        <button class="btn btn-default navbar-btn  dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->full_name }} <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="{{ URL::to('users/signout') }}">Logout</a></li>
        </ul>
        @else
        <button id="signin" type="button" data-url="{{ URL::to('/users/signin') }}" class="btn btn-default navbar-btn">Sign in</button>
        <button id="register" type="button" data-url="{{ URL::to('/users/register') }}" class="btn navbar-btn">Register </button>
        @endif
      </div>
    </div> 
  </div>
</div>

