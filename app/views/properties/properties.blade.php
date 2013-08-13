  @if(count($properties) > 0)
  <ul class="list-group" >
    @foreach($properties as $property) 
    <li class="list-group-item" style="padding-right: 0px">
    <div class="media">
      <a class="pull-left" href="#">
        <img src="{{ URL::to('properties/image') }}/{{ $property->id }}/0" width="140" height="80" class="img-rounded" />
      </a>
      <div class="row media-body" >
        <div class="col-lg-8">
          <h4 class="media-heading"><a href="{{ URL::to('properties/show') }}/{{ $property->id }}"> {{ $property-> title }} </a></h4>
          <p> {{ $property->property_type }} </p>
          <p> {{ $property->city }} - {{ $property->country }}
        </div>
        <div class="col-lg-4 pull-right" style="text-align: right">
          <p> From </p> <p> ₱ {{ $property->price }} </p>
          <a href="{{ URL::to('properties/show/' . $property->id) }}" class="btn btn-info btn-xs">Details</a>
        </div>
      </div>
    </div>
    </li>
    @endforeach
  </ul>
  {{ $properties->links(); }}
  @else
  <h3>No results found.</h3>
  @endif
<script>
$(document).ready(function(e) {
  $('a[data-id="result_page"]').click(function(e) {
    e.preventDefault();
    load_results($(this).attr('href'));
    return false; 
  });      
});
</script>
