<?php

class PropertyController extends BaseController {

  public function getIndex() {
    $properties = Property::all();
    Log::info(json_encode($properties));
    return View::make('properties/index', array('properties' => $properties)) ;
  }

  public function getNew() {
    return View::make('properties/new');
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

