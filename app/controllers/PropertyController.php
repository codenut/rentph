<?php

class PropertyController extends BaseController {

  public function getNew() {
    $user_id = Auth::user()->id;
    return View::make('properties/new');
  }
  
  public function postCreate() {
        
  }
}  

