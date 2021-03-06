@extends('layout')
@section('content')
{{ HTML::style('css/skins/tango/skin.css') }}
{{ HTML::script('js/jquery.jcarousel.js') }}
<div class="col-lg-12 panel">
  <h3>&nbsp;{{ $property->title }}</h3>
  <p>&nbsp;&nbsp;{{ $property->property_type }} - {{ $property->city }}, {{ $property->country }} </p>
  <div class="col-lg-9" style="padding-left: 0; padding-bottom: 0">
    <div class="col-lg-12 panel">
      <div class="panel-heading"><b>Photos</b></div>
      <div style="margin:auto; width: 100%; text-align: center">
        <img src="{{ URL::to('properties/image/'. $property->id . '/0') }}" id="main-image" class="img-rounded" width="400" />
      </div>
      <div class="panel-footer">
        <ul id="images_carousel" class="jcarousel-skin-tango" style="width: 100%">
          @for($i = 0; $i < count($property->images); $i++)
          <li><a href="#" onclick="return load_image({{ $property->id }}, {{ $i }})"><img src="{{ URL::to('properties/image/' . $property->id . '/' . $i) }}" width="100" /></a></li>
          @endfor
        </u>
      </div>
      <script>
        $(document).ready(function() {
          $('#images_carousel').jcarousel({}); 
        });
        function load_image(property_id, index) {
          $("#main-image").attr('src', '{{ URL::to("properties/image") }}/' + property_id + '/' + index + '/' + new Date().getTime());
          return false; 
        }
      </script>
    </div>
    <div class="col-lg-12 panel">
      <div class="panel-heading"><b>Description</b></div>
      <div class="col-lg-8">
        <p>{{ $property->description }}</p>
      </div>
      <div class="col-lg-4 panel">
        Place type: <b>{{ $property->property_type }}</b>
        <ul class="list-group">
          <li class="list-group-item">Accommodates: <b>{{ $property->accommodates }}</b></li>
          <li class="list-group-item">Price: <b>₱ {{ $property->price }} / Night</b></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="col-lg-12 panel">
      <p><b>From</b><span class="pull-right">
        <select class="form-control input-sm">
          <option>Per night</option>
          <option>Per week</option>
          <option>Per month</option>
        </select>
      </span></p>
      <p><h4>₱ {{ $property->price }}</h4></p>
      <div class="form-group">
        <label>Check in</label>
        <div>
          <input data-format="dd/mm/yyyy" class="form-control" id="check-out" type="text" placeholder="dd/mm/yyyy"></input>
        </div> 
      </div>
      <div class="form-group">
        <label>Check out</label>
        <div>
          <input data-format="dd/mm/yyyy" class="form-control" id="check-out" type="text" placeholder="dd/mm/yyyy"></input>
        </div> 
      </div>
      <div class="panel-footer">
        <input type="button" value="BOOK" class="btn btn-primary btn-block" />
      </div>
    </div>
    <div class="col-lg-12 panel">
      <div style="text-align: center">
        {{ HTML::image('img/user.jpg', '', array('class' => 'img-thumbnail')) }}
        <h4>{{ $property->user->full_name }}</h4>
      </div>
      <div class="panel-footer">
        <input type="button" class="btn btn-success btn-block" value="Contact me" /> 
      </div>
    </div>
  </div>
</div>
@stop
