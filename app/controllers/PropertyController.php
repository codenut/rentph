<?php

class PropertyController extends BaseController {

  public function getIndex() {
    $properties = Property::paginate(10);
    return View::make('properties/index', array('properties' => $properties)) ;
  }

  public function getNew() {
    return View::make('properties/new');
  }

  public function getShow($property_id) {
    $property = Property::find($property_id);
    Log::info("Property: " . $property);
    return View::make('properties/show', array('property' => $property)); 
  }
  
  public function postCreate() {
    $property = Input::all();        
    $property['user_id'] = Auth::user()->id;
    $validator = Property::validates($property);

    if($validator->fails()) {
      return array('result' => 'error', 'message' => ($validator->messages()->toArray())); 
    } else {
      $property = Property::create($property);    
      return array('result' => 'success');
    }

  }
}  

