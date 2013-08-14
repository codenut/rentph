@extends('layout')
@section('content')
<div class="col-lg-12 panel well">
  <div class="col-lg-9" style="padding-left: 0">
    <form class="form-inline">
      <input type="text" id="keyword" class="form-control" style="width: 58%" placeholder="Where to? Madrid Amsterdam Singapore">
      <input data-format="dd/mm/yyyy" class="form-control" id="check-in" style="width: 15%" type="text" placeholder="Check in"></input>
      <input data-format="dd/mm/yyyy" class="form-control" id="check-out" style="width: 15%" type="text" placeholder="Check out"></input>
      <a href="#" class="btn btn-primary" style="width: 10%" id="search">Search</a>
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
  <div id="results">
  </div>
</div>
<script>
  function load_results(url) {
    $.ajax({
      url: url,
      method: 'GET', 
      data: {'keyword': $("#keyword").val() },
      success: function(resp) {
        $('#results').html(resp); 
      }
    })
  }
  $(document).ready(function() {
    var url = '{{ URL::to('properties/results') }}' + '?page=1';
    load_results(url); 
    $("#search").click(function(e) {
      e.preventDefault();
      load_results(url)
      return false;
    });
  });
</script>
<div class='col-lg-3' style="padding-right: 0">
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
