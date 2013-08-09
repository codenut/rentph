@extends('layout')
@section('content')
<div class='col-lg-9'>
  <ul class="list-group" >
    @foreach($properties as $property) 
    <li class="list-group-item">
    <div class="media">
      <a class="pull-left" href="#">
        {{ HTML::image('img/user.jpg', '', array('width' => '80')) }}
      </a>
      <div class="media-body">
        <h4 class="media-heading">{{ $property-> title }}</h4>
        <p> {{ $property->description }} </p>
      </div>
    </div>
    </li>
    @endforeach
  </ul>
  <ul class="pagination">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
</div>
<div class='col-lg-3 panel'>
  test
</div>
@stop
