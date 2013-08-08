@extends('layout')
@section('content')
<div class="col-lg-8 panel panel">
  <div class="panel-heading"><b>List your space</b></div>
  <form>
    <legend>Tell us about your place</legend>
    <div class="form-group">
      <label >Title of place</label>
      <div>
        <input type="text" class="form-control" />
      </div>
    </div>
    <div class="form-group">
      <label >Description</label>
      <div>
        <textarea class="form-control" ></textarea>
      </div>
    </div>
    <div class="form-group">
      <label>Type of place</label>
      <div>
        <label class="checkbox-inline">
          <input type="radio" > Holiday Home
        </label>
        <label class="checkbox-inline">
          <input type="radio" > Apartment
        </label>
        <label class="checkbox-inline">
          <input type="radio" > Private room
        </label>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-6 form-group">
          <label>Accommodates</label>
          <input type="text" class="form-control" />
      </div>
      <div class="col-lg-6 form-group">
        <label>Price per night</label>
        <input type="text" class="form-control" />
      </div>
    </div>
    <br/>
    <legend>Location</legend>
    <div class="form-group">
      <label>Country</label>
      <div>
        <input type="text" class="form-control" />
      </div>
    </div>
    <div class="form-group">
      <label>Street</label>
      <div>
        <input type="text" class="form-control" />
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 form-group">
        <label>City</label>
        <div>
          <input type="text" class="form-control" />
        </div>
      </div>
      <div class="col-lg-4 form-group">
        <label>Zip code</label>
        <div>
          <input type="text" class="form-control" />
        </div>
      </div>
    </div>
  </form> 
  <br/>
  <div class="panel-footer">
    <input type="submit" class="btn btn-primary btn-block" />
    <input type="button" class="btn btn-default btn-block" value="Cancel" />
  </div>
</div>
@stop
