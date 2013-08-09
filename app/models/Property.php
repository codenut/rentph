<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Property extends Eloquent {
  protected $fillable = array('title', 'description', 'user_id', 'property_type', 'accommodates', 
    'price', 'country', 'street', 'city', 'zip_code');

  public function user() {
    return $this->belongsTo('User'); 
  }

  public static function validates($input) {
    $rules = array(
      'title' => 'required',
      'description' => 'required',
      'accommodates' => 'required|integer',
      'type' => 'required',
      'price' => 'required|integer',
      'country' => 'required',
      'city' => 'required',
      'zip_code' => 'required|integer',
      'street' => 'required'
    ); 

    $apply_rules = array();

    foreach($input as $key => $rule) {
      if(array_key_exists($key, $rules)) {
        $apply_rules[$key] = $rules[$key]; 
      }
    }

    return Validator::make($input, $apply_rules); 
  }

}
