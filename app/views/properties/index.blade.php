@extends('layout')
@section('content')
<div class="col-lg-12 panel well">
  <div class="col-lg-9" style="padding-left: 0">
    <form class="form-inline">
      <input type="text" class="form-control" style="width: 58%" placeholder="Where to? Madrid Amsterdam Singapore">
      <input data-format="dd/mm/yyyy" class="form-control" id="check-in" style="width: 15%" type="text" placeholder="Check in"></input>
      <input data-format="dd/mm/yyyy" class="form-control" id="check-out" style="width: 15%" type="text" placeholder="Check out"></input>
      <button type="submit" class="btn btn-primary" style="width: 10%">Search</button>
    </form>
  </div>
  <div class="col-lg-3" style="text-align: right; padding-right: 0">
    <div class="pull-right btn-group">
      <input type="button" class="btn" value="List"></input> 
      <input type="button" class="btn btn-default" value="Photo"></input> 
      <input type="button" class="btn btn-default" value="Map"></input> 
    </div>
  </div>
</div>
<div class='col-lg-9' style="padding-left: 0px;">
  <ul class="list-group" >
    @foreach($properties as $property) 
    <li class="list-group-item" style="padding-right: 0px">
    <div class="media">
      <a class="pull-left" href="#">
        {{ HTML::image('img/user.jpg', '', array('width' => '140', 'height' => '80', 'class' => 'img-rounded')) }}
      </a>
      <div class="row media-body" >
        <div class="col-lg-8">
          <h4 class="media-heading"><a href="{{ URL::to('properties/show') }}/{{ $property->id }}"> {{ $property-> title }} </a></h4>
          <p> {{ $property->property_type }} </p>
          <p> {{ $property->city }} - {{ $property->country }}
        </div>
        <div class="col-lg-4 pull-right" style="text-align: right">
          <p> From </p> <p> ₱ {{ $property->price }} </p>
          <a href="#" class="btn btn-info btn-xs">Details</a>
        </div>
      </div>
    </div>
    </li>
    @endforeach
  </ul>
  {{ $properties->links(); }}
</div>
<div class='col-lg-3'>
  <div class="panel">
    <div class="panel-heading"><b>Price per night</b></div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Php 0 - 500
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Php 500 - 1000
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Php 1000 - 3000
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Php 3000 - 5000
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Php 5000 - 10000
      </label>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading"><b>Room type</b></div>
    <div class="checkbox">
      <label>
        <input type="checkbox">
        Holiday Home
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox">
        Aparment
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox">
        Private room
      </label>
    </div>
  </div>
  <div class="panel">
    <div class="panel-heading"><b>Ameneties</b></div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Wifi
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Internet
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Television
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" />
        Gym
      </label>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#check-in').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true
    }); 
    $('#check-out').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true
    }); 
  })
</script>
@stop
