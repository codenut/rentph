<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a href="#" class="navbar-brand">IBM PP</a>
      <div class="nav-collapse collapse">
        <ul class="nav navbar-nav">
          <li>
          <a href="#">Listings</a>
          </li>
          <li>
          <a href="{{ URL::action('PropertyController@getNew') }}">Post Property</a>
          </li>
        </ul>
      </div>
      <div class="nav-collapse collapse pull-right btn-group">
        <button id="signin" type="button" data-url="{{ URL::to('/users/signin') }}" class="btn btn-default navbar-btn">Sign in</button>
        <button id="register" type="button" data-url="{{ URL::to('/users/register') }}" class="btn navbar-btn">Register</button>
      </div>
    </div> 
  </div>
</div>

