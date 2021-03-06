@extends('layout')
@section('content')
{{ Form::open(array('url' => 'properties/create', 'id' => 'create_properties')) }}
<input type="hidden" id="image_id" name="image_dir" value="{{ sha1(time()) }}" />
<div class="col-lg-7 panel panel">
  <div class="panel-heading"><b>List your space</b></div>
  <legend>Tell us about your place</legend>
  <div class="form-group" id="title_div">
    <label >Title of place</label>
    <div>
      {{ Form::text('title', '', array('class' => 'form-control', 'id' => 'title_input'))}}
    </div>
  </div>
  <div class="form-group" id='description_div'>
    <label >Description</label>
    <div>
      {{ Form::textarea('description', '', array('class' => 'form-control', 'rows' => '3', 'id' => 'description_input')) }}
    </div>
  </div>
  <div class="form-group" id='type_div'>
    <label>Type of place</label>
    <div>
      <label class="checkbox-inline">
        {{ Form::radio('property_type',  'Holiday Home', array('checked' => 'checked')) }} Holiday Home
      </label>
      <label class="checkbox-inline">
        {{ Form::radio('property_type', 'Apartment') }} Apartment
      </label>
      <label class="checkbox-inline">
        {{ Form::radio('property_type', 'Private room') }} Private room
      </label>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 form-group" id='accommodates_div'>
      <label>Accommodates</label>
      {{ Form::text('accommodates', '', array('class' => 'form-control', 'id' => 'accommodates_input')) }}
    </div>
    <div class="col-lg-6 form-group" id='price_div'>
      <label>Price per night</label>
      <div class="input-group">
        <span class="input-group-addon">₱</span>{{ Form::text('price', '', array('class' => 'form-control', 'id' => 'price_input')) }}
      </div>
    </div>
  </div>
  <br/>
  <legend>Location</legend>
  <div class="form-group" id='country_div'>
    <label>Country</label>
    <div>
      {{ Form::text('country', '', array('class' => 'form-control', 'id' => 'country_input')) }}
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 form-group" id='city_div'>
      <label>City</label>
      <div>
        {{ Form::text('city', '', array('class' => 'form-control', 'id' => 'city_input')) }}
      </div>
    </div>
    <div class="col-lg-4 form-group" id='zip_code_div'>
      <label>Zip code</label>
      <div>
        {{ Form::text('zip_code', '', array('class' => 'form-control', 'id' => 'zip_code_input')) }}
      </div>
    </div>
  </div>
  <div class="form-group" id='street_div'>
    <label>Street</label>
    <div>
      {{ Form::text('street', '', array('class' => 'form-control', 'id' => 'street_input')) }}
    </div>
  </div>
  <br/>
  <div class="panel-footer">
    {{ Form::button('Submit', array('class' => 'btn btn-primary btn-block', 'id' => 'submit_form')) }}
    {{ Form::button('Cancel', array('class' => 'btn btn-default btn-block')) }}
  </div>
</div>
{{ Form::close() }}
<div class="col-lg-5">
  <div class="panel">
    <div class="panel-heading"><b>Images</b></div>
    <div id="image_dir_div">
      {{ HTML::style('css/dropzone.css') }}
      {{ HTML::script('js/dropzone.js') }}
      {{ Form::open(array('url' => 'properties/upload', 'class' => 'dropzone', 'id' => 'upload-images', 'files' => true)) }}
      {{ Form::close() }}
    </div>
    <script>
      Dropzone.options.uploadImages = {
        url: '{{ URL::to('properties/upload') }}/' + $('#image_id').val(),
        maxFilesize: 10, // MB
        //addRemoveLinks: true,
        init: function() {
          this.on('addedFile', function(file) {
            //alert(file);
          }); 
        },
        /*accept: function(file, done) {
          done(); 
        }*/
      };
    </script>
  </diV>
</div>
<script>
  $(document).ready(function() {
    $('#submit_form').click(function(e) {
      $('span[class="help-block"]').remove();
      $('div').removeClass('has-error');
      $.ajax({
        url: '{{ URL::to('properties/create') }}',
        method: 'POST',
        data: $('#create_properties').serialize(),
        success: function(resp) {
          if(resp['result'] == 'error') {
            for(var key in resp['message']) {
              var input_div = '#' + key + '_div';
              $(input_div).addClass('has-error');
              $(input_div).append('<span class="help-block">' + resp['message'][key] + '</span>');
            }
          } else {
            window.location = "{{ URL::to('properties/show/') }}/" + resp['id'];
          } 
        }
      });
      e.preventDefault();
      return false;
    });
  })
</script>
@stop
